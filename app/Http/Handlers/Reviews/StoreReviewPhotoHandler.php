<?php
namespace App\Http\Handlers\Reviews;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Reviews\StoreReviewPhotoRequest;
use App\Models\Reviews\Review;
use App\Models\Reviews\ReviewPhoto;
use Intervention\Image\Facades\Image;

class StoreReviewPhotoHandler extends BaseHandler
{

    /**
     * @param StoreReviewPhotoRequest $request
     * @param ReviewPhoto|null $review
     * @return ReviewPhoto|null
     */
    public function process(StoreReviewPhotoRequest $request, Review $review = null): ?Review
    {

        try {

            /**
             * Upload Image
             */
            $originalImage= $request->file('filename');
            $thumbnailImage = Image::make($originalImage);
            $thumbnailPath = storage_path().'/app/public/thumbnail/';
            $originalPath = storage_path().'/app/public/images/';
            $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
            $thumbnailImage->resize(150,150);
            $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName());

            /**
             * Save to Table
             */
            $imagemodel = new ReviewPhoto();
            $imagemodel->review_id = $review->id;
            $imagemodel->photo = time().$originalImage->getClientOriginalName();
            $imagemodel->save();

            return $review;

        } catch (\Throwable $e) {

            $this->setErrors($e->getMessage());
            return null;

        }
    }
}
