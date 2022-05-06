<?php

namespace App\Http\Controllers\Clinic;

use App\Http\Controllers\Controller;
use App\Http\Handlers\Clinic\StoreClinicImageHandler;
use App\Http\Requests\Clinic\StoreClinicImageRequest;
use App\Http\Requests\Clinic\StoreClinicPageRequest;
use App\Models\Clinic\Clinic;
use App\Models\Clinic\ClinicImage;
use App\Models\Clinic\ClinicPage;
use Illuminate\Http\Request;

class ClinicImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Clinic $clinic)
    {

        return view('clinic.images.index', [
            'clinic' => $clinic,
            'model' => $clinic->images()->paginate(10),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Clinic $clinic, ClinicImage $image)
    {

        return view('clinic.images.form', [
            'clinic' => $clinic,
            'model' => $image,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClinicImageRequest $request, StoreClinicImageHandler $handler, Clinic $clinic, ClinicImage $image)
    {

        if ($image = $handler->process($request, $clinic))
        {
            return redirect()->route('clinic.images.index', $clinic)->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

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
    public function edit(Clinic $clinic, ClinicImage $image)
    {

        return view('clinic.images.form', [
            'clinic' => $clinic,
            'model' => $image,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClinicImageRequest $request, StoreClinicImageHandler $handler, Clinic $clinic, ClinicImage $image)
    {

        if ($image = $handler->process($request, $clinic, $image))
        {
            return redirect()->route('clinic.images.index', $clinic)->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinic $clinic, ClinicImage $image)
    {

        if ($image->delete())
        {
            return back()->with('message', __( 'Удалено' ));
        }

        return back()->withErrors([__( 'Не удалось удалить запись' )]);

    }
}
