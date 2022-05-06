<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sales\StoreSalePageRequest;
use App\Models\Sales\Sale;
use App\Models\Sales\SalePage;
use Illuminate\Http\Request;

class SalePageController extends Controller
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
    public function store(StoreSalePageRequest $request, Sale $sale)
    {

        if (!$model = $sale->page)
        {
            $model = (new SalePage())->sale()->associate($sale);
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
     * @param  \App\Models\Sales\SalePage  $salePage
     * @return \Illuminate\Http\Response
     */
    public function show(SalePage $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales\SalePage  $salePage
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {

        return view('sale.page', [
            'sale' => $sale,
            'model' => $sale->page ?? new SalePage()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sales\SalePage  $salePage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalePage $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales\SalePage  $salePage
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalePage $page)
    {
        //
    }
}
