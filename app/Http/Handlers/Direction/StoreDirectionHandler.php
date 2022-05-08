<?php
namespace App\Http\Handlers\Direction;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Direction\StoreDirectionCategoryRequest;
use App\Http\Requests\Direction\StoreDirectionRequest;
use App\Models\Direction\Direction;
use App\Models\Direction\DirectionCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
                $filename = Str::random(30);
                $thumbnailImage = Image::make($originalImage);
                $thumbnailPath = Storage::disk('public')->path('thumbnail/');
                $originalPath = Storage::disk('public')->path('images/');
                $thumbnailImage->save($originalPath.$filename.'.'.$originalImage->getClientOriginalExtension());

                /**
                 * Thumb
                 */
                $thumbnailImage->fit(230,155);
                $thumbnailImage->save($thumbnailPath.$filename.'.'.$originalImage->getClientOriginalExtension());
                $thumbnailImage->fit(810,530);
                $thumbnailImage->save($thumbnailPath.'single-'.$filename.'.'.$originalImage->getClientOriginalExtension());

                /**
                 * Save to Table
                 */
                $direction->image = $filename.'.'.$originalImage->getClientOriginalExtension();
                $direction->save();
            }

            return $direction;

        } catch (\Throwable $e) {

            $this->setErrors($e->getMessage());
            return null;

        }
    }

}
