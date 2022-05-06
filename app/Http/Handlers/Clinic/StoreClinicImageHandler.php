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
                $thumbnailImage = Image::make($originalImage);
                $thumbnailPath = storage_path().'/app/public/thumbnail/';
                $originalPath = storage_path().'/app/public/images/';
                $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
                $thumbnailImage->fit(400,400);
                $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName());

                /**
                 * Save to Table
                 */
                $image->image = time().$originalImage->getClientOriginalName();
                $image->save();
            }


            return $image;

        } catch (\Throwable $e) {

            $this->setErrors('Не удалось сохранить запись');
            return null;

        }
    }

}
