<?php
namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Http\Handlers\Sales\StoreSaleCategoryHandler;
use App\Http\Requests\Sales\StoreSaleCategoryRequest;
use App\Models\Sales\SaleCategory;

class SaleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SaleCategory $category)
    {

        return view('sale.categories.index', [
            'model' => $category->paginate(10),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SaleCategory $category)
    {

        return view('sale.categories.form', [
            'model' => $category,
            'categories' => $category->all()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaleCategoryRequest $request, StoreSaleCategoryHandler $handler)
    {

        if ($category = $handler->process($request))
        {
            return redirect()->route('sale.categories.index')->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SaleCategory  $saleCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SaleCategory $saleCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaleCategory  $saleCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleCategory $category)
    {

        return view('sale.categories.form', [
            'model' => $category,
            'categories' => $category->whereNotCurrent($category->id)->get()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SaleCategory  $saleCategory
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSaleCategoryRequest $request, StoreSaleCategoryHandler $handler, SaleCategory $category)
    {

        if ($category = $handler->process($request, $category))
        {
            return redirect()->route('sale.categories.index')->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaleCategory  $saleCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleCategory $category)
    {

        if ($category->delete())
        {
            return redirect()->route('sale.categories.index')->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors([__('Не удалось удалить запись')]);

    }
}
