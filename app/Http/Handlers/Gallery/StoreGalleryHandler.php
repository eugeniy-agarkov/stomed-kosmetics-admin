<?php
namespace App\Http\Handlers\Gallery;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Gallery\StoreGalleryRequest;
use App\Models\Gallery\Gallery;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class StoreGalleryHandler extends BaseHandler
{

    /**
     * @param StoreGalleryRequest $request
     * @param Gallery|null $image
     * @return Gallery|null
     */
    public function process(StoreGalleryRequest $request, Gallery $image = null): ?Gallery
    {
        try {

            if (!$image)
            {
                $image = new Gallery();
            }

            $image->fill($request->all());

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
                $thumbnailImage->fit(770,450);
                $thumbnailImage->save($thumbnailPath.$filename.'.'.$originalImage->getClientOriginalExtension());

                /**
                 * Save to Table
                 */
                $image->image = $filename.'.'.$originalImage->getClientOriginalExtension();
                $image->save();
            }

            return $image;

        } catch (\Throwable $e) {

            $this->setErrors($e->getMessage());
            return null;

        }
    }

}
