<?php
namespace App\Http\Handlers\Direction;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Direction\StoreDirectionCategoryRequest;
use App\Http\Requests\Direction\StoreDirectionRequest;
use App\Models\Direction\Direction;
use App\Models\Direction\DirectionCategory;
use Intervention\Image\Facades\Image;

class StoreDirectionHandler extends BaseHandler
{

    /**
     * @param StoreDirectionCategoryRequest $request
     * @param DirectionCategory|null $category
     * @return DirectionCategory|null
     */
    public function process(StoreDirectionRequest $request, Direction $direction = null): ?Direction
    {
        try {

            if (!$direction)
            {
                $direction = new Direction();
            }

            $direction->fill($request->all());

            if (!$direction->save())
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

                $thumbnailImage->fit(230,155);
                $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName());

                $thumbnailImage->fit(810,530);
                $thumbnailImage->save($thumbnailPath.'single-'.time().$originalImage->getClientOriginalName());

                /**
                 * Save to Table
                 */
                $direction->image = time().$originalImage->getClientOriginalName();
                $direction->save();
            }

            return $direction;

        } catch (\Throwable $e) {

            $this->setErrors($e->getMessage());
            return null;

        }
    }

}
