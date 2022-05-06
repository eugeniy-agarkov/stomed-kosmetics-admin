<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreBlogPageRequest;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogPage;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


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
    public function store(StoreBlogPageRequest $request, Blog $blog)
    {

        if (!$model = $blog->page)
        {
            $model = (new BlogPage())->blog()->associate($blog);
        }

        $model->fill($request->all());

        if ($model->save())
        {

            return back()->with('message', __( 'Сохранено' ));

        }

        return back()->withErrors([__( 'Не удалось сохранить страницу' )]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog\BlogPage  $blogPage
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPage $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog\BlogPage  $blogPage
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {

        return view('blog.page', [
            'blog' => $blog,
            'model' => $blog->page ?? new BlogPage()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog\BlogPage  $blogPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPage $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog\BlogPage  $blogPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPage $page)
    {
        //
    }
}
