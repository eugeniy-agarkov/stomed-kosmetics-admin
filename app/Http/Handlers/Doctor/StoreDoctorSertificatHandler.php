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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
                $filename = Str::random(30);
                $thumbnailImage = Image::make($originalImage);
                $thumbnailPath = Storage::disk('public')->path('thumbnail/');
                $originalPath = Storage::disk('public')->path('images/');
                $thumbnailImage->save($originalPath.$filename.'.'.$originalImage->getClientOriginalExtension());

                /**
                 * Thumb
                 */
                $thumbnailImage->fit(300,230);
                $thumbnailImage->save($thumbnailPath.$filename.'.'.$originalImage->getClientOriginalExtension());

                /**
                 * Save to Table
                 */
                $sertificat->image = $filename.'.'.$originalImage->getClientOriginalExtension();
                $sertificat->save();
            }


            return $sertificat;

        } catch (\Throwable $e) {

            $this->setErrors('Не удалось сохранить запись');
            return null;

        }
    }

}
