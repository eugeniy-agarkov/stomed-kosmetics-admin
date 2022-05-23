<?php
namespace App\Http\Handlers\Reviews;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Reviews\StoreReviewRequest;
use App\Models\Reviews\Review;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class StoreReviewHandler extends BaseHandler
{

    /**
     * @param StoreReviewRequest $request
     * @param Review|null $review
     * @return Review|null
     */
    public function process(StoreReviewRequest $request, Review $review = null): ?Review
    {
        try {

                if (!$review)
                {

                    $review = new Review();

                }

                $review->fill($request->all());

                if (!$review->save())
                {
                    throw new \LogicException('Failed to store review record');
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
                $thumbnailImage->fit(400,500);
                $thumbnailImage->save($thumbnailPath.$filename.'.'.$originalImage->getClientOriginalExtension());

                /**
                 * Save to Table
                 */
                $review->original = $filename.'.'.$originalImage->getClientOriginalExtension();
                $review->save();

            }

                return $review;

        } catch (\Throwable $e) {

            $this->setErrors($e->getMessage());
            return null;

        }
    }
}
