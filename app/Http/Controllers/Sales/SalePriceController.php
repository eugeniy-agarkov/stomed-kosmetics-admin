<?php
namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Clinic\Clinic;
use App\Models\Sales\Sale;
use App\Models\Sales\SalePrice;
use Illuminate\Http\Request;

class SalePriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sale $sale)
    {

        return view('sale.price.index', [
            'sale' => $sale,
            'model' => $sale->prices ?? new SalePrice(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Sale $sale, SalePrice $price)
    {

        return view('sale.price.form', [
            'sale' => $sale,
            'model' => $price,
            'clinics' => Clinic::all(),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Sale $sale)
    {

        $price = new SalePrice($request->input());
        $price->sale()->associate($sale);

        if ($price->save())
        {

            return redirect()->route('sale.prices.index', $sale)->with('message', __( 'Сохранено' ));

        }

        throw new \LogicException('Failed to store price');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalePrice  $salePrice
     * @return \Illuminate\Http\Response
     */
    public function show(SalePrice $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalePrice  $salePrice
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale, SalePrice $price)
    {

        return view('sale.price.form', [
            'sale' => $sale,
            'model' => $price,
            'clinics' => Clinic::all(),
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sales\SalePrice  $salePrice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale, SalePrice $price)
    {

        $price->fill($request->input());

        if ($price->save())
        {

            return redirect()->route('sale.prices.index', $sale)->with('message', __( 'Сохранено' ));

        }

        throw new \LogicException('Failed to store price');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales\SalePrice  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale, SalePrice $price)
    {

        if ($price->delete())
        {
            return back()->with('message', __( 'Удалено' ));
        }

        return back()->withErrors([__( 'Не удалось удалить запись' )]);

    }
}
