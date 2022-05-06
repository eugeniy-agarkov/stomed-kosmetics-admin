<?php
namespace App\Http\Handlers\Sales;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Blog\StoreBlogCategoryRequest;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Http\Requests\Sales\StoreSaleRequest;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogCategory;
use App\Models\Sales\Sale;
use Intervention\Image\Facades\Image;

class StoreSaleHandler extends BaseHandler
{

    /**
     * @param StoreBlogCategoryRequest $request
     * @param Blog|null $blog
     * @return Blog|null
     */
    public function process(StoreSaleRequest $request, Sale $sale = null): ?Sale
    {
        try {

            if (!$sale)
            {
                $sale = new Sale();
            }

            $sale->fill($request->all());

            if (!$sale->save())
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
                $thumbnailImage->fit(380,400);
                $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName());

                /**
                 * Save to Table
                 */
                $sale->photo = time().$originalImage->getClientOriginalName();
                $sale->save();
            }


            return $sale;

        } catch (\Throwable $e) {

            $this->setErrors($e->getMessage());
            return null;

        }
    }

}
