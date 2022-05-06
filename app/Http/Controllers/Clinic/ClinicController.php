<?php

namespace App\Http\Controllers\Clinic;

use App\Http\Controllers\Controller;
use App\Http\Handlers\Clinic\StoreClinicHandler;
use App\Http\Requests\Clinic\StoreClinicRequest;
use App\Models\Clinic\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Clinic $clinic)
    {
        return view('clinic.index', [
            'model' => $clinic->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Clinic $clinic)
    {
        return view('clinic.form', [
            'model' => $clinic,
            'details' => $clinic->detail,
            'page' => $clinic->page,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClinicRequest $request, StoreClinicHandler $handler, Clinic $clinic)
    {

        if ($clinic = $handler->process($request))
        {
            return redirect()->route('clinic.edit', $clinic)->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function show(Clinic $clinic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinic $clinic)
    {

        return view('clinic.form', [
            'model' => $clinic,
            'details' => $clinic->detail,
            'page' => $clinic->page,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClinicRequest $request, StoreClinicHandler $handler, Clinic $clinic)
    {

        if ($clinic = $handler->process($request, $clinic))
        {
            return redirect()->route('clinic.index')->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinic $clinic)
    {

        if ($clinic->delete())
        {

            return redirect()->route('clinic.index')->with('message', __( 'Сохранено' ));

        }

        return back()->withErrors([__('Не удалось удалить запись')]);

    }
}
