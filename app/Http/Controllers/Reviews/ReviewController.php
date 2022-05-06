<?php

namespace App\Http\Controllers\Reviews;

use App\Enums\ReviewsEnum;
use App\Http\Controllers\Controller;
use App\Http\Handlers\Reviews\StoreReviewHandler;
use App\Http\Requests\Reviews\StoreReviewRequest;
use App\Models\Clinic\Clinic;
use App\Models\Doctor\Doctor;
use App\Models\Reviews\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Review $review, Doctor $doctors)
    {

        return view('reviews.index', [
            'model' => $review->paginate(10),
            'doctors' => $doctors->all(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Review $review, Clinic $clinic, Doctor $doctor)
    {

        return view('reviews.form', [
            'model' => $review,
            'clinics' => $clinic->all(),
            'doctors' => $doctor->all(),
            'type' => ReviewsEnum::getName(),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReviewRequest $request, StoreReviewHandler $handler, Review $review)
    {

        if ($review = $handler->process($request))
        {
            return redirect()->route('reviews.edit', $review)->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review, Clinic $clinic, Doctor $doctor)
    {

        return view('reviews.form', [
            'model' => $review,
            'clinics' => $clinic->all(),
            'doctors' => $doctor->all(),
            'type' => ReviewsEnum::getName(),
            'photos' => $review->photos,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(StoreReviewRequest $request, StoreReviewHandler $handler, Review $review)
    {

        if ($review = $handler->process($request, $review))
        {
            return redirect()->route('reviews.edit', $review)->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {

        if ($review->delete())
        {
            return redirect()->route('reviews.index')->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors([__('Не удалось удалить запись')]);

    }
}
