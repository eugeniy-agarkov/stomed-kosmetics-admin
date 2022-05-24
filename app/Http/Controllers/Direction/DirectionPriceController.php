<?php

namespace App\Http\Controllers\Direction;

use App\Http\Controllers\Controller;
use App\Models\Direction\Direction;
use App\Models\Direction\DirectionPrice;
use App\Models\Clinic\Clinic;
use Illuminate\Http\Request;

class DirectionPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Direction $direction)
    {

        return view('direction.price.index', [
            'direction' => $direction,
            'model' => $direction->prices ?? new DirectionPrice(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Direction $direction, DirectionPrice $price)
    {

        return view('direction.price.form', [
            'direction' => $direction,
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
    public function store(Request $request, Direction $direction)
    {

        $price = new DirectionPrice($request->input());
        $price->direction()->associate($direction);

        if ($price->save())
        {

            return redirect()->route('direction.prices.index', $direction)->with('message', __( 'Сохранено' ));

        }

        throw new \LogicException('Failed to store price');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DirectionPrice  $price
     * @return \Illuminate\Http\Response
     */
    public function show(DirectionPrice $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DirectionPrice  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Direction $direction, DirectionPrice $price)
    {

        return view('direction.price.form', [
            'direction' => $direction,
            'model' => $price,
            'clinics' => Clinic::all(),
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Direction\DirectionPrice  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Direction $direction, DirectionPrice $price)
    {

        $price->fill($request->input());

        if ($price->save())
        {

            return redirect()->route('direction.prices.index', $direction)->with('message', __( 'Сохранено' ));

        }

        throw new \LogicException('Failed to store price');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Direction\DirectionPrice  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Direction $direction, DirectionPrice $price)
    {

        if ($price->delete())
        {
            return back()->with('message', __( 'Удалено' ));
        }

        return back()->withErrors([__( 'Не удалось удалить запись' )]);

    }
}
