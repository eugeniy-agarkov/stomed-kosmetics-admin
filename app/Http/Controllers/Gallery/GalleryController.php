<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use App\Http\Handlers\Blog\StoreBlogHandler;
use App\Http\Handlers\Gallery\StoreGalleryHandler;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Http\Requests\Gallery\StoreGalleryRequest;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogCategory;
use App\Models\Direction\Direction;
use App\Models\Gallery\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Gallery $gallery, Direction $direction)
    {

        return view('gallery.index', [
            'model' => $gallery->paginate(10),
            'directions' => $direction->all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Gallery $gallery, Direction $direction)
    {

        return view('gallery.form', [
            'model' => $gallery,
            'directions' => $direction->all()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGalleryRequest $request, StoreGalleryHandler $handler)
    {

        if ($image = $handler->process($request))
        {
            return redirect()->route('gallery.index')->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $image, Direction $direction)
    {

        return view('gallery.form', [
            'model' => $image,
            'directions' => $direction->all()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $image
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGalleryRequest $request, StoreGalleryHandler $handler, Gallery $image)
    {

        if ($image = $handler->process($request, $image))
        {
            return redirect()->route('gallery.index')->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $image)
    {

        if ($image->delete())
        {
            return redirect()->route('gallery.index')->with('message', __( 'Удалено' ));
        }

        return back()->withErrors([__('Не удалось удалить запись')]);

    }

}
