<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use App\Http\Handlers\Reviews\StoreReviewPhotoHandler;
use App\Http\Handlers\Reviews\StoreReviewPhotosHandler;
use App\Http\Requests\Reviews\StoreReviewPhotoRequest;
use App\Models\Reviews\Review;
use App\Models\Reviews\ReviewPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ReviewPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(StoreReviewPhotoRequest $request, StoreReviewPhotoHandler $handler, Review $review)
    {

        if ($photo = $handler->process($request, $review))
        {
            return back()->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReviewPhoto  $reviewPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(ReviewPhoto $reviewPhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReviewPhoto  $reviewPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(ReviewPhoto $reviewPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReviewPhoto  $reviewPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReviewPhoto $reviewPhoto)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Review $review, ReviewPhoto $id)
    {

        File::delete([storage_path() . '/app/public/thumbnail/' . $id->photo, storage_path() . '/app/public/images/' . $id->photo]);

        if ($id->delete())
        {
            return back()->with('message', __( 'Удалено' ));
        }

        return back()->withErrors([__( 'Не удалось удалить запись' )]);

    }
}
