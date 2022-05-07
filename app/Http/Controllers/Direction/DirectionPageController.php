<?php

namespace App\Http\Controllers\Direction;

use App\Http\Controllers\Controller;
use App\Http\Requests\Direction\StoreDirectionPageRequest;
use App\Models\Direction\Direction;
use App\Models\Direction\DirectionPage;
use Illuminate\Http\Request;

class DirectionPageController extends Controller
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
    public function store(StoreDirectionPageRequest $request, Direction $direction)
    {

        if (!$model = $direction->page)
        {
            $model = (new DirectionPage())->direction()->associate($direction);
        }

        $model->fill($request->all());

        if ($model->save())
        {

            return back()->with('message', __( 'Сохранено' ));

        }

        return back()->withErrors([__( 'Не удалось сохранить страницу' )]);

    }

    /**
     * @param DirectionPage $page
     * @return void
     */
    public function show(DirectionPage $page)
    {
        //
    }

    /**
     * @param Direction $direction
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Direction $direction)
    {

        return view('direction.page', [
            'direction' => $direction,
            'model' => $direction->page ?? new DirectionPage()
        ]);

    }

    /**
     * @param Request $request
     * @param DirectionPage $page
     * @return void
     */
    public function update(Request $request, DirectionPage $page)
    {
        //
    }

    /**
     * @param DirectionPage $page
     * @return void
     */
    public function destroy(DirectionPage $page)
    {
        //
    }
}
