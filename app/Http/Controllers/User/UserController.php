<?php

namespace App\Http\Controllers\User;

use App\Enums\UserEnum;
use App\Http\Controllers\Controller;
use App\Http\Handlers\User\StoreUserHandler;
use App\Http\Requests\User\StoreUserRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {

        return view('user.index', [
            'model' => $user->paginate(10),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {

        return view('user.form', [
            'model' => $user,
            'roles' => UserEnum::$name
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request, StoreUserHandler $handler)
    {

        if ($user = $handler->process($request))
        {
            return redirect()->route('user.index')->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        return view('user.form', [
            'model' => $user,
            'roles' => UserEnum::$name
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, StoreUserHandler $handler, User $user)
    {

        if ($user = $handler->process($request, $user))
        {
            return redirect()->route('user.index')->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        if ($user->delete())
        {
            return redirect()->route('user.index')->with('message', __( 'Удалено' ));
        }

        return back()->withErrors([__('Не удалось удалить запись')]);

    }

}
