<?php

namespace App\Http\Controllers\Doctor;

use App\Enums\DoctorEnum;
use App\Http\Controllers\Controller;
use App\Http\Handlers\Doctor\StoreDoctorHandler;
use App\Http\Requests\Doctor\StoreDoctorRequest;
use App\Models\Clinic\Clinic;
use App\Models\Doctor\Doctor;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Doctor $doctor)
    {

        return view('doctor.index', [
            'model' => $doctor->paginate(10),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Doctor $doctor, Clinic $clinic)
    {

        return view('doctor.form', [
            'model' => $doctor,
            'clinic' => $clinic->get(),
            'call_home' => DoctorEnum::$name
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request, StoreDoctorHandler $handler, Doctor $doctor)
    {

        if ($doctor = $handler->process($request))
        {
            return redirect()->route('doctor.index')->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor, Clinic $clinic)
    {

        return view('doctor.form', [
            'model' => $doctor,
            'clinic' => $clinic->get(),
            'call_home' => DoctorEnum::$name
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDoctorRequest $request, StoreDoctorHandler $handler, Doctor $doctor)
    {

        if ($doctor = $handler->process($request, $doctor))
        {
            return redirect()->route('doctor.index')->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {

        if ($doctor->delete())
        {
            return redirect()->route('doctor.index')->with('message', __( 'Удалено' ));
        }

        return back()->withErrors([__('Не удалось удалить запись')]);

    }
}
