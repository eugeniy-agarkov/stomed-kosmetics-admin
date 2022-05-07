<?php

namespace App\Http\Controllers\Direction;

use App\Http\Controllers\Controller;
use App\Http\Handlers\Direction\StoreDirectionImageHandler;
use App\Http\Requests\Direction\StoreDirectionImageRequest;
use App\Models\Direction\Direction;
use App\Models\Direction\DirectionImage;

class DirectionImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Direction $direction)
    {

        return view('direction.images.index', [
            'direction' => $direction,
            'model' => $direction->images()->paginate(10),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Direction $direction, DirectionImage $image)
    {

        return view('direction.images.form', [
            'direction' => $direction,
            'model' => $image,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDirectionImageRequest $request, StoreDirectionImageHandler $handler, Direction $direction, DirectionImage $image)
    {

        if ($image = $handler->process($request, $direction))
        {
            return redirect()->route('direction.images.index', $direction)->with('message', __( 'Сохранено' ));
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
    public function edit(Direction $direction, DirectionImage $image)
    {

        return view('direction.images.form', [
            'direction' => $direction,
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
    public function update(StoreDirectionImageRequest $request, StoreDirectionImageHandler $handler, Direction $direction, DirectionImage $image)
    {

        if ($image = $handler->process($request, $direction, $image))
        {
            return redirect()->route('direction.images.index', $direction)->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Direction $direction, DirectionImage $image)
    {

        if ($image->delete())
        {
            return back()->with('message', __( 'Удалено' ));
        }

        return back()->withErrors([__( 'Не удалось удалить запись' )]);

    }
}
