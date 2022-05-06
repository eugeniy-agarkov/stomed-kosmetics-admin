<?php
namespace App\Http\Handlers\Direction;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Direction\StoreDirectionCategoryRequest;
use App\Models\Direction\DirectionCategory;
use Intervention\Image\Facades\Image;

class StoreDirectionCategoryHandler extends BaseHandler
{

    /**
     * @param StoreDirectionCategoryRequest $request
     * @param DirectionCategory|null $category
     * @return DirectionCategory|null
     */
    public function process(StoreDirectionCategoryRequest $request, DirectionCategory $category = null): ?DirectionCategory
    {
        try {

            if (!$category)
            {
                $category = new DirectionCategory();
            }

            $category->fill($request->all());

            if (!$category->save())
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
                $originalPath = storage_path().'/app/public/images/';
                $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());

                /**
                 * Save to Table
                 */
                $category->image = time().$originalImage->getClientOriginalName();
                $category->save();
            }

            return $category;

        } catch (\Throwable $e) {

            $this->setErrors($e->getMessage());
            return null;

        }
    }

}
