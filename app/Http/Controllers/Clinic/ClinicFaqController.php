<?php

namespace App\Http\Controllers\Clinic;

use App\Http\Controllers\Controller;
use App\Http\Handlers\Clinic\StoreClinicFaqHandler;
use App\Http\Requests\Clinic\StoreClinicFaqRequest;
use App\Models\Clinic\Clinic;
use App\Models\Clinic\ClinicFaq;

class ClinicFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Clinic $clinic)
    {

        return view('clinic.faq.index', [
            'clinic' => $clinic,
            'model' => $clinic->faq()->paginate(10),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Clinic $clinic, ClinicFaq $faq)
    {

        return view('clinic.faq.form', [
            'clinic' => $clinic,
            'model' => $faq,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClinicFaqRequest $request, StoreClinicFaqHandler $handler, Clinic $clinic, ClinicFaq $faq)
    {

        if ($faq = $handler->process($request, $clinic))
        {
            return redirect()->route('clinic.faq.index', $clinic)->with('message', __( 'Сохранено' ));
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
    public function edit(Clinic $clinic, ClinicFaq $faq)
    {

        return view('clinic.faq.form', [
            'clinic' => $clinic,
            'model' => $faq,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClinicFaqRequest $request, StoreClinicFaqHandler $handler, Clinic $clinic, ClinicFaq $faq)
    {

        if ($faq = $handler->process($request, $clinic, $faq))
        {
            return redirect()->route('clinic.faq.index', $clinic)->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinic $clinic, ClinicFaq $faq)
    {

        if ($faq->delete())
        {
            return back()->with('message', __( 'Удалено' ));
        }

        return back()->withErrors([__( 'Не удалось удалить запись' )]);

    }
}
