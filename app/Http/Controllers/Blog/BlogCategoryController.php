<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Handlers\Blog\StoreBlogCategoryHandler;
use App\Http\Requests\Blog\StoreBlogCategoryRequest;
use App\Http\Requests\Blog\StoreCategoryRequest;
use App\Models\Blog\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BlogCategory $category)
    {

        return view('blog.categories.index', [
            'model' => $category->paginate(10),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(BlogCategory $category)
    {

        return view('blog.categories.form', [
            'model' => $category,
            'categories' => $category->all()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogCategoryRequest $request, StoreBlogCategoryHandler $handler)
    {

        if ($category = $handler->process($request))
        {
            return redirect()->route('blog.categories.index', $category)->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogCategory $category)
    {

        return view('blog.categories.form', [
            'model' => $category,
            'categories' => $category->whereNotCurrent($category->id)->get()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogCategoryRequest $request, StoreBlogCategoryHandler $handler, BlogCategory $category)
    {

        if ($category = $handler->process($request, $category))
        {
            return redirect()->route('blog.categories.index', $category)->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogCategory $category)
    {

        if ($category->delete())
        {
            return redirect()->route('blog.categories.index')->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors([__('Не удалось удалить запись')]);

    }
}
