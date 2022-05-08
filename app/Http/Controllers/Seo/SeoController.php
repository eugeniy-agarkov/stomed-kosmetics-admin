<?php
namespace App\Http\Controllers\Seo;

use App\Http\Controllers\Controller;
use App\Http\Handlers\Seo\StoreSeoHandler;
use App\Http\Requests\Seo\StoreSeoRequest;
use App\Models\Seo\Seo;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seo $seo)
    {

        return view('seo.index', [
            'model' => $seo->paginate(10),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Seo $seo)
    {

        return view('seo.form', [
            'model' => $seo,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSeoRequest $request, StoreSeoHandler $handler)
    {

        if ($seo = $handler->process($request))
        {
            return redirect()->route('seo.index')->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function show(Seo $seo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function edit(Seo $seo)
    {

        return view('seo.form', [
            'model' => $seo,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSeoRequest $request, StoreSeoHandler $handler, Seo $seo)
    {

        if ($seo = $handler->process($request, $seo))
        {
            return redirect()->route('seo.index')->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seo $seo)
    {

        if ($seo->delete())
        {
            return redirect()->route('seo.index')->with('message', __( 'Удалено' ));
        }

        return back()->withErrors([__('Не удалось удалить запись')]);

    }

}
