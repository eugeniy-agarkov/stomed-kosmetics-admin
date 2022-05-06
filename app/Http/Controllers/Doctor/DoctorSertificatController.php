<?php
namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Handlers\Doctor\StoreDoctorSertificatHandler;
use App\Http\Requests\Doctor\StoreDoctorSertificatRequest;
use App\Models\Doctor\Doctor;
use App\Models\Doctor\DoctorSertificat;

class DoctorSertificatController extends Controller
{

    /**
     * @param Doctor $doctor
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Doctor $doctor)
    {

        return view('doctor.sertificat.index', [
            'doctor' => $doctor,
            'model' => $doctor->sertificats()->paginate(10) ?? new DoctorSertificat(),
        ]);

    }

    /**
     * @param Doctor $doctor
     * @param DoctorSertificat $sertificat
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Doctor $doctor, DoctorSertificat $sertificat)
    {

        return view('doctor.sertificat.form', [
            'doctor' => $doctor,
            'model' => $sertificat,
        ]);

    }

    /**
     * @param StoreDoctorSertificatRequest $request
     * @param StoreDoctorSertificatHandler $handler
     * @param Doctor $doctor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreDoctorSertificatRequest $request, StoreDoctorSertificatHandler $handler, Doctor $doctor)
    {

        if ($image = $handler->process($request, $doctor))
        {
            return redirect()->route('doctor.sertificat.index', $doctor)->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * @param Doctor $doctor
     * @return void
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * @param Doctor $doctor
     * @param DoctorSertificat $sertificat
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Doctor $doctor, DoctorSertificat $sertificat)
    {

        return view('doctor.sertificat.form', [
            'model' => $sertificat,
            'doctor' => $doctor,
        ]);

    }

    /**
     * @param StoreDoctorSertificatRequest $request
     * @param StoreDoctorSertificatHandler $handler
     * @param Doctor $doctor
     * @param DoctorSertificat $sertificat
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreDoctorSertificatRequest $request, StoreDoctorSertificatHandler $handler, Doctor $doctor, DoctorSertificat $sertificat)
    {

        if ($sertificat = $handler->process($request, $doctor, $sertificat))
        {
            return redirect()->route('doctor.sertificat.index', $doctor)->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * @param Doctor $doctor
     * @param DoctorSertificat $sertificat
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Doctor $doctor, DoctorSertificat $sertificat)
    {

        if ($sertificat->delete())
        {
            return redirect()->route('doctor.sertificat.index', $doctor)->with('message', __( 'Удалено' ));
        }

        return back()->withErrors([__('Не удалось удалить запись')]);

    }
}
