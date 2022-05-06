<?php
namespace App\Http\Handlers\Reviews;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Reviews\StoreReviewRequest;
use App\Models\Reviews\Review;

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

                return $review;

        } catch (\Throwable $e) {

            $this->setErrors($e->getMessage());
            return null;

        }
    }
}
