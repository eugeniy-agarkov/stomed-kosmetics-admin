<?php
namespace App\Http\Handlers\Blog;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Blog\StoreBlogCategoryRequest;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Models\Blog\Blog;
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
                $originalImage= $request->file('filename');
                $thumbnailImage = Image::make($originalImage);
                $thumbnailPath = storage_path().'/app/public/thumbnail/';
                $originalPath = storage_path().'/app/public/images/';
                $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
                $thumbnailImage->fit(380,400);
                $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName());

                /**
                 * Save to Table
                 */
                $blog->photo = time().$originalImage->getClientOriginalName();
                $blog->save();
            }

            return $blog;

        } catch (\Throwable $e) {

            $this->setErrors('Не удалось сохранить запись');
            return null;

        }
    }

}
