<?php

namespace App\Http\Controllers\Clinic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clinic\StoreClinicPageRequest;
use App\Models\Clinic\Clinic;
use App\Models\Clinic\ClinicPage;
use Illuminate\Http\Request;

class ClinicPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinic $clinic, ClinicPage $page)
    {

        return view('clinic.page', [
            'clinic' => $clinic,
            'model' => $clinic->page,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClinicPageRequest $request, Clinic $clinic)
    {

        if (!$model = $clinic->page)
        {
            $model = (new ClinicPage())->clinic()->associate($clinic);
        }

        $model->fill($request->all());

        if ($model->save())
        {
            return back()->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors([__( 'Не удалось сохранить страницу' )]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
