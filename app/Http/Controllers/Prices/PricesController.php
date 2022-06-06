<?php

namespace App\Http\Controllers\Prices;

use App\Enums\DoctorEnum;
use App\Http\Controllers\Controller;
use App\Http\Handlers\Doctor\StoreDoctorHandler;
use App\Http\Requests\Doctor\StoreDoctorRequest;
use App\Models\Clinic\Clinic;
use App\Models\Direction\DirectionPrice;
use App\Models\Doctor\Doctor;
use App\Models\Doctor\DoctorPrice;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class PricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if( $request->routeIs('prices.doctor') )
        {

            $model = DoctorPrice::paginate(10);

        }elseif ( $request->routeIs('prices.direction') )
        {

            $model = DirectionPrice::paginate(10);

        }

        return view('prices.index', [
            'model' => $model,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        try {

            if( $request->input('model') === 'Direction' )
            {

                DirectionPrice::find($request->input('id'))->update($request->except(['id', 'model']));

            }elseif ( $request->input('model') === 'Doctor' )
            {

                DoctorPrice::find($request->input('id'))->update($request->except(['id', 'model']));

            }

            return response()->json([
                'status' => 'success',
                'message' => __( 'Информация обновлена.' ),
            ], 200);

        } catch (\Throwable $e) {

            return response()->json([
                'status' => 'error',
                'message' => __( 'Ошибка: ' ) . $e->getMessage(),
            ], 301);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        try {

            if( $request->input('model') === 'Direction' )
            {

                DirectionPrice::find($request->input('id'))->delete();

            }elseif ( $request->input('model') === 'Doctor' )
            {

                DoctorPrice::find($request->input('id'))->delete();

            }

            return response()->json([
                'status' => 'success',
                'message' => __( 'Запись удалена.' ),
            ], 200);

        } catch (\Throwable $e) {

            return response()->json([
                'status' => 'error',
                'message' => __( 'Ошибка: ' ) . $e->getMessage(),
            ], 301);

        }

    }

}
