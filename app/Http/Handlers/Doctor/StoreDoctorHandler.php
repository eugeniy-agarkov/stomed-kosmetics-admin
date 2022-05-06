<?php
namespace App\Http\Handlers\Doctor;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Doctor\StoreDoctorRequest;
use App\Models\Doctor\Doctor;
use Intervention\Image\Facades\Image;

class StoreDoctorHandler extends BaseHandler
{

    /**
     * @param StoreDoctorRequest $request
     * @param Doctor|null $doctor
     * @return Doctor|null
     */
    public function process(StoreDoctorRequest $request, Doctor $doctor = null): ?Doctor
    {
        try {

            if (!$doctor)
            {
                $doctor = new Doctor();
            }

            $doctor->fill($request->all());

            if (!$doctor->save())
            {
                throw new \LogicException('Failed to store clinic record');
            }

            $this->storeDoctorRelatedData($doctor, $request);

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
                $thumbnailImage->fit(320,430);
                $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName());

                /**
                 * Save to Table
                 */
                $doctor->image = time().$originalImage->getClientOriginalName();
                $doctor->save();
            }

            return $doctor;

        } catch (\Throwable $e) {

            $this->setErrors($e->getMessage());
            return null;

        }
    }

    /**
     * @param Doctor $doctor
     * @param StoreDoctorRequest $request
     * @return void
     */
    protected function storeDoctorRelatedData(Doctor $doctor, StoreDoctorRequest $request)
    {
        $doctor->clinics()->sync($request->input('clinics', []));
    }

}
