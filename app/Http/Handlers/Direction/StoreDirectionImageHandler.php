<?php
namespace App\Http\Handlers\Direction;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Direction\StoreDirectionImageRequest;
use App\Models\Direction\Direction;
use App\Models\Direction\DirectionImage;
use Intervention\Image\Facades\Image;

class StoreDirectionImageHandler extends BaseHandler
{

    /**
     * @param StoreDirectionImageRequest $request
     * @param Direction|null $direction
     * @return Direction|null
     */
    public function process(StoreDirectionImageRequest $request, Direction $direction, DirectionImage $image = null): ?DirectionImage
    {
        try {

            if (!$image)
            {
                $image = new DirectionImage();
            }

            $image->fill($request->all());
            $image->direction()->associate($direction);

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
