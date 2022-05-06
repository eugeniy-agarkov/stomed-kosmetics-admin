<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor\StoreDoctorPageRequest;
use App\Models\Doctor\Doctor;
use App\Models\Doctor\DoctorPage;
use Illuminate\Http\Request;

class DoctorPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorPageRequest $request, Doctor $doctor)
    {

        if (!$model = $doctor->page)
        {
            $model = (new DoctorPage())->doctor()->associate($doctor);
        }

        $model->fill($request->all());

        if ($model->save())
        {

            return back()->with('message', __( 'Сохранено' ));

        }

        return back()->withErrors([__( 'Не удалось сохранить страницу' )]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog\DoctorPage  $page
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorPage $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog\DoctorPage  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {

        return view('doctor.page', [
            'doctor' => $doctor,
            'model' => $doctor->page ?? new DoctorPage()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog\DoctorPage  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoctorPage $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog\DoctorPage  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorPage $page)
    {
        //
    }
}
