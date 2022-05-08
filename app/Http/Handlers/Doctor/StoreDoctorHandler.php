<?php
namespace App\Http\Handlers\Doctor;

use App\Http\Handlers\BaseHandler;
use App\Http\Requests\Doctor\StoreDoctorRequest;
use App\Models\Doctor\Doctor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
                $filename = Str::random(30);
                $thumbnailImage = Image::make($originalImage);
                $thumbnailPath = Storage::disk('public')->path('thumbnail/');
                $originalPath = Storage::disk('public')->path('images/');
                $thumbnailImage->save($originalPath.$filename.'.'.$originalImage->getClientOriginalExtension());

                /**
                 * Thumb
                 */
                $thumbnailImage->fit(320,430);
                $thumbnailImage->save($thumbnailPath.$filename.'.'.$originalImage->getClientOriginalExtension());

                /**
                 * Save to Table
                 */
                $doctor->image = $filename.'.'.$originalImage->getClientOriginalExtension();
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
