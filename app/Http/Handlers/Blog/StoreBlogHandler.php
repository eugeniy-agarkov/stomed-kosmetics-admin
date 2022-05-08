<?php
namespace App\Http\Handlers\Blog;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Blog\StoreBlogCategoryRequest;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Models\Blog\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class StoreBlogHandler extends BaseHandler
{

    /**
     * @param StoreBlogCategoryRequest $request
     * @param Blog|null $blog
     * @return Blog|null
     */
    public function process(StoreBlogRequest $request, Blog $blog = null): ?Blog
    {
        try {

            if (!$blog)
            {
                $blog = new Blog();
            }

            $blog->fill($request->all());

            if (!$blog->save())
            {
                throw new \LogicException('Failed to store news record');
            }

            /**
             * Upload Image
             */
            if( $request->has('filename') )
            {

                $originalImage = $request->file('filename');
                $filename = Str::random(30);
                $thumbnailImage = Image::make($originalImage);
                $thumbnailPath = Storage::disk('public')->path('thumbnail/');
                $originalPath = Storage::disk('public')->path('images/');
                $thumbnailImage->save($originalPath.$filename.'.'.$originalImage->getClientOriginalExtension());

                /**
                 * Thumb
                 */
                $thumbnailImage->fit(380,400);
                $thumbnailImage->save($thumbnailPath.$filename.'.'.$originalImage->getClientOriginalExtension());

                /**
                 * Save to Table
                 */
                $blog->photo = $filename.'.'.$originalImage->getClientOriginalExtension();
                $blog->save();

            }

            return $blog;

        } catch (\Throwable $e) {

            $this->setErrors($e->getMessage());
            return null;

        }
    }

}
