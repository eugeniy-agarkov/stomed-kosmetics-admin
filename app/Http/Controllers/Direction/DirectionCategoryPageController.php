<?php

namespace App\Http\Controllers\Direction;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreBlogPageRequest;
use App\Http\Requests\Direction\StoreDirectionCategoryPageRequest;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogPage;
use App\Models\Direction\DirectionCategory;
use App\Models\Direction\DirectionCategoryPage;
use Illuminate\Http\Request;

class DirectionCategoryPageController extends Controller
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
    public function store(StoreDirectionCategoryPageRequest $request, DirectionCategory $category)
    {

        if (!$model = $category->page)
        {
            $model = (new DirectionCategoryPage())->category()->associate($category);
        }

        $model->fill($request->all());

        if ($model->save())
        {

            return back()->with('message', __( 'Сохранено' ));

        }

        return back()->withErrors([__( 'Не удалось сохранить страницу' )]);

    }

    /**
     * @param DirectionCategoryPage $page
     * @return void
     */
    public function show(DirectionCategoryPage $page)
    {
        //
    }

    /**
     * @param DirectionCategory $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(DirectionCategory $category)
    {

        return view('direction.categories.page', [
            'category' => $category,
            'model' => $category->page ?? new DirectionCategoryPage()
        ]);

    }

    /**
     * @param Request $request
     * @param DirectionCategoryPage $page
     * @return void
     */
    public function update(Request $request, DirectionCategoryPage $page)
    {
        //
    }

    /**
     * @param DirectionCategoryPage $page
     * @return void
     */
    public function destroy(DirectionCategoryPage $page)
    {
        //
    }
}
