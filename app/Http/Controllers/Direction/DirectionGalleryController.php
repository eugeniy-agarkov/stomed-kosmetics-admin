<?php
namespace App\Http\Controllers\Direction;

use App\Http\Controllers\Controller;
use App\Http\Handlers\Gallery\StoreGalleryHandler;
use App\Http\Requests\Gallery\StoreGalleryRequest;
use App\Models\Direction\Direction;
use App\Models\Gallery\Gallery;

class DirectionGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Direction $direction)
    {

        return view('direction.gallery.index', [
            'direction' => $direction,
            'model' => $direction->gallery()->paginate(10),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Direction $direction, Gallery $image)
    {

        return view('direction.gallery.form', [
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
    public function store(StoreGalleryRequest $request, StoreGalleryHandler $handler, Gallery $image, Direction $direction)
    {

        if ($image = $handler->process($request, $image))
        {
            return redirect()->route('direction.gallery.index', $direction)->with('message', __( 'Сохранено' ));
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
    public function edit(Direction $direction, Gallery $image)
    {

        return view('direction.gallery.form', [
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
    public function update(StoreGalleryRequest $request, StoreGalleryHandler $handler, Direction $direction, Gallery $image)
    {

        if ($image = $handler->process($request, $image))
        {
            return redirect()->route('direction.gallery.index', $direction)->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Direction $direction, Gallery $image)
    {

        if ($image->delete())
        {
            return back()->with('message', __( 'Удалено' ));
        }

        return back()->withErrors([__( 'Не удалось удалить запись' )]);

    }
}
