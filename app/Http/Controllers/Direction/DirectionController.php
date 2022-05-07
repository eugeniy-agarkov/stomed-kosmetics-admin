<?php

namespace App\Http\Controllers\Direction;

use App\Http\Controllers\Controller;
use App\Http\Handlers\Direction\StoreDirectionHandler;
use App\Http\Requests\Direction\StoreDirectionRequest;
use App\Models\Direction\Direction;
use App\Models\Direction\DirectionCategory;
use App\Models\Clinic\Clinic;

class DirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Direction $direction, DirectionCategory $categories)
    {

        return view('direction.index', [
            'model' => $direction->paginate(10),
            'categories' => $categories->all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Direction $direction, DirectionCategory $categories, Clinic $clinics)
    {

        return view('direction.form', [
            'model' => $direction,
            'categories' => $categories->whereParents()->get(),
            'clinics' => $clinics->get()->pluck('name', 'id')->toArray(),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDirectionRequest $request, StoreDirectionHandler $handler)
    {

        if ($direction = $handler->process($request))
        {
            return redirect()->route('direction.index')->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function show(Direction $direction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function edit(Direction $direction, DirectionCategory $categories, Clinic $clinics)
    {

        return view('direction.form', [
            'model' => $direction,
            'categories' => $categories->whereParents()->get(),
            'clinics' => $clinics->get()->pluck('name', 'id')->toArray(),
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDirectionRequest $request, StoreDirectionHandler $handler, Direction $direction)
    {

        if ($direction = $handler->process($request, $direction))
        {
            return redirect()->route('direction.index')->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Direction $direction)
    {

        if ($direction->delete())
        {
            return redirect()->route('Direction.index')->with('message', __( 'Удалено' ));
        }

        return back()->withErrors([__('Не удалось удалить запись')]);

    }

}
