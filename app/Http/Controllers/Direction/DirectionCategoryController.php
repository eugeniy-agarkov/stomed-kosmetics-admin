<?php

namespace App\Http\Controllers\Direction;

use App\Http\Controllers\Controller;
use App\Http\Handlers\Direction\StoreDirectionCategoryHandler;
use App\Http\Requests\Direction\StoreDirectionCategoryRequest;
use App\Models\Direction\DirectionCategory;

class DirectionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DirectionCategory $category)
    {

        return view('direction.categories.index', [
            'model' => $category->paginate(10),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(DirectionCategory $category)
    {

        return view('direction.categories.form', [
            'model' => $category,
            'categories' => $category->whereParents()->get()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDirectionCategoryRequest $request, StoreDirectionCategoryHandler $handler)
    {

        if ($category = $handler->process($request))
        {
            return redirect()->route('direction.categories.index')->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DirectionCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function show(DirectionCategory $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DirectionCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(DirectionCategory $category)
    {

        return view('direction.categories.form', [
            'model' => $category,
            'categories' => $category->whereParents()->get(),
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DirectionCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDirectionCategoryRequest $request, StoreDirectionCategoryHandler $handler, DirectionCategory $category)
    {

        if ($category = $handler->process($request, $category))
        {
            return redirect()->route('direction.categories.index')->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DirectionCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(DirectionCategory $category)
    {

        if ($category->delete())
        {
            return redirect()->route('direction.categories.index')->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors([__('Не удалось удалить запись')]);

    }

}
