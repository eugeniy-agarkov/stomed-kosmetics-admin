<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogPrice;
use App\Models\Clinic\Clinic;
use Illuminate\Http\Request;

class BlogPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Blog $blog)
    {

        return view('blog.price.index', [
            'blog' => $blog,
            'model' => $blog->prices ?? new BlogPrice(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Blog $blog, BlogPrice $price)
    {

        return view('blog.price.form', [
            'blog' => $blog,
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
    public function store(Request $request, Blog $blog)
    {

        $price = new BlogPrice($request->input());
        $price->blog()->associate($blog);

        if ($price->save())
        {

            return redirect()->route('blog.prices.index', $blog)->with('message', __( 'Сохранено' ));

        }

        throw new \LogicException('Failed to store price');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPrice  $blogPrice
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPrice $blogPrice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPrice  $blogPrice
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog, BlogPrice $price)
    {

        return view('blog.price.form', [
            'blog' => $blog,
            'model' => $price,
            'clinics' => Clinic::all(),
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog\BlogPrice  $blogPrice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog, BlogPrice $price)
    {

        $price->fill($request->input());

        if ($price->save())
        {

            return redirect()->route('blog.prices.index', $blog)->with('message', __( 'Сохранено' ));

        }

        throw new \LogicException('Failed to store price');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog\BlogPrice  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog, BlogPrice $price)
    {

        if ($price->delete())
        {
            return back()->with('message', __( 'Удалено' ));
        }

        return back()->withErrors([__( 'Не удалось удалить запись' )]);

    }
}
