<?php
namespace App\Http\Handlers\Clinic;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Blog\StoreBlogCategoryRequest;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Http\Requests\Clinic\StoreClinicImageRequest;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogCategory;
use App\Models\Clinic\Clinic;
use App\Models\Clinic\ClinicImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class StoreClinicImageHandler extends BaseHandler
{

    /**
     * @param StoreBlogCategoryRequest $request
     * @param Blog|null $blog
     * @return Blog|null
     */
    public function process(StoreClinicImageRequest $request, Clinic $clinic, ClinicImage $image = null): ?ClinicImage
    {
        try {

            if (!$image)
            {
                $image = new ClinicImage();
            }

            $image->fill($request->all());
            $image->clinic()->associate($clinic);

            if (!$image->save())
            {
                throw new \LogicException('Failed to store news record');
            }

            /**
             * Upload Image
             */
            if( $request->has('filename') )
            {
                $originalImage= $request->file('filename');
                $filename = Str::random(30);
                $thumbnailImage = Image::make($originalImage);
                $thumbnailPath = Storage::disk('public')->path('thumbnail/');
                $originalPath = Storage::disk('public')->path('images/');
                $thumbnailImage->save($originalPath.$filename.'.'.$originalImage->getClientOriginalExtension());

                /**
                 * Thumb
                 */
                $thumbnailImage->fit(500,330);
                $thumbnailImage->save($thumbnailPath.$filename.'.'.$originalImage->getClientOriginalExtension());

                /**
                 * Save to Table
                 */
                $image->image = $filename.'.'.$originalImage->getClientOriginalExtension();
                $image->save();
            }


            return $image;

        } catch (\Throwable $e) {

            $this->setErrors('Не удалось сохранить запись');
            return null;

        }
    }

}
