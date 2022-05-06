<?php
namespace App\Http\Handlers\Doctor;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Blog\StoreBlogCategoryRequest;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Http\Requests\Clinic\StoreClinicImageRequest;
use App\Http\Requests\Doctor\StoreDoctorPriceRequest;
use App\Http\Requests\Doctor\StoreDoctorSertificatRequest;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogCategory;
use App\Models\Clinic\Clinic;
use App\Models\Clinic\ClinicImage;
use App\Models\Doctor\Doctor;
use App\Models\Doctor\DoctorPrice;
use App\Models\Doctor\DoctorSertificat;
use Intervention\Image\Facades\Image;

class StoreDoctorPriceHandler extends BaseHandler
{

    /**
     * @param StoreBlogCategoryRequest $request
     * @param Blog|null $blog
     * @return Blog|null
     */
    public function process(StoreDoctorPriceRequest $request, Doctor $doctor, DoctorPrice $price = null): ?DoctorPrice
    {
        try {

            if (!$price)
            {
                $price = new DoctorPrice();
            }

            $price->fill($request->all());
            $price->doctor()->associate($doctor);

            if (!$price->save())
            {
                throw new \LogicException('Failed to store news record');
            }

            return $price;

        } catch (\Throwable $e) {

            $this->setErrors('Не удалось сохранить запись');
            return null;

        }
    }

}
