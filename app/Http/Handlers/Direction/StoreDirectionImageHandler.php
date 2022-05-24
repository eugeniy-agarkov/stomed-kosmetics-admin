<?php
namespace App\Http\Handlers\Direction;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Direction\StoreDirectionImageRequest;
use App\Models\Direction\Direction;
use App\Models\Direction\DirectionImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
                $filename = Str::random(30);
                $thumbnailImage = Image::make($originalImage);
                $thumbnailPath = Storage::disk('public')->path('thumbnail/');
                $originalPath = Storage::disk('public')->path('images/');
                $thumbnailImage->save($originalPath.$filename.'.'.$originalImage->getClientOriginalExtension());

                /**
                 * Thumb
                 */
                $thumbnailImage->fit(400,400);
                $thumbnailImage->save($thumbnailPath.$filename.'.'.$originalImage->getClientOriginalExtension());

                $thumbnailImage->fit(810,530);
                $thumbnailImage->save($thumbnailPath.'single-'.$filename.'.'.$originalImage->getClientOriginalExtension());

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
