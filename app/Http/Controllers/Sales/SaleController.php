<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Http\Handlers\Blog\StoreBlogHandler;
use App\Http\Handlers\Sales\StoreSaleHandler;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Http\Requests\Sales\StoreSaleRequest;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogCategory;
use App\Models\Sales\Sale;
use App\Models\Sales\SaleCategory;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sale $sale, SaleCategory $categories)
    {

        return view('sale.index', [
            'model' => $sale->whereSearch()->paginate(10),
            'categories' => $categories->all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Sale $sale, SaleCategory $categories)
    {

        return view('sale.form', [
            'model' => $sale,
            'categories' => $categories->all()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaleRequest $request, StoreSaleHandler $handler)
    {

        if ($sale = $handler->process($request))
        {
            return redirect()->route('sale.edit', $sale)->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sales  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale, SaleCategory $categories)
    {

        return view('sale.form', [
            'model' => $sale,
            'categories' => $categories->all()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sales  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSaleRequest $request, StoreSaleHandler $handler, Sale $sale)
    {

        if ($sale = $handler->process($request, $sale))
        {
            return redirect()->route('sale.index')->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {

        if ($sale->delete())
        {
            return redirect()->route('sale.index')->with('message', __( 'Удалено' ));
        }

        return back()->withErrors([__('Не удалось удалить запись')]);

    }

}
