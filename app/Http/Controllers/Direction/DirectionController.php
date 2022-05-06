<?php

namespace App\Http\Controllers\Direction;

use App\Http\Controllers\Controller;
use App\Http\Handlers\Blog\StoreBlogHandler;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogCategory;
use App\Models\Direction\Direction;
use App\Models\Direction\DirectionCategory;

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
    public function create(Direction $direction, DirectionCategory $categories)
    {

        return view('direction.form', [
            'model' => $direction,
            'categories' => $categories->all()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request, StoreBlogHandler $handler)
    {

        if ($blog = $handler->process($request))
        {
            return redirect()->route('blog.edit', $blog)->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog, BlogCategory $categories)
    {

        return view('blog.form', [
            'model' => $blog,
            'categories' => $categories->all()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogRequest $request, StoreBlogHandler $handler, Blog $blog)
    {

        if ($blog = $handler->process($request, $blog))
        {
            return redirect()->route('blog.index', $blog)->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {

        if ($blog->delete())
        {
            return redirect()->route('blog.index')->with('message', __( 'Удалено' ));
        }

        return back()->withErrors([__('Не удалось удалить запись')]);

    }

}
