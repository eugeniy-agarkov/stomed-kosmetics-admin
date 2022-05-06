<?php
namespace App\Http\Handlers\Doctor;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Blog\StoreBlogCategoryRequest;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Http\Requests\Clinic\StoreClinicImageRequest;
use App\Http\Requests\Doctor\StoreDoctorSertificatRequest;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogCategory;
use App\Models\Clinic\Clinic;
use App\Models\Clinic\ClinicImage;
use App\Models\Doctor\Doctor;
use App\Models\Doctor\DoctorSertificat;
use Intervention\Image\Facades\Image;

class StoreDoctorSertificatHandler extends BaseHandler
{

    /**
     * @param StoreBlogCategoryRequest $request
     * @param Blog|null $blog
     * @return Blog|null
     */
    public function process(StoreDoctorSertificatRequest $request, Doctor $doctor, DoctorSertificat $sertificat = null): ?DoctorSertificat
    {
        try {

            if (!$sertificat)
            {
                $sertificat = new DoctorSertificat();
            }

            $sertificat->fill($request->all());
            $sertificat->doctor()->associate($doctor);

            if (!$sertificat->save())
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
                $thumbnailImage->fit(300,230);
                $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName());

                /**
                 * Save to Table
                 */
                $sertificat->image = time().$originalImage->getClientOriginalName();
                $sertificat->save();
            }


            return $sertificat;

        } catch (\Throwable $e) {

            $this->setErrors('Не удалось сохранить запись');
            return null;

        }
    }

}
