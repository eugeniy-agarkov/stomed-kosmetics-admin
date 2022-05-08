<?php
namespace App\Http\Handlers\Direction;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Direction\StoreDirectionCategoryRequest;
use App\Models\Direction\DirectionCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
                $filename = Str::random(30);
                $thumbnailImage = Image::make($originalImage);
                $originalPath = Storage::disk('public')->path('images/');
                $thumbnailImage->save($originalPath.$filename.'.'.$originalImage->getClientOriginalExtension());

                /**
                 * Save to Table
                 */
                $category->image = $filename.'.'.$originalImage->getClientOriginalExtension();
                $category->save();
            }

            return $category;

        } catch (\Throwable $e) {

            $this->setErrors($e->getMessage());
            return null;

        }
    }

}
