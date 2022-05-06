<?php
namespace App\Http\Controllers\Redirect;

use App\Http\Controllers\Controller;
use App\Http\Handlers\Redirect\StoreRedirectHandler;
use App\Http\Requests\Redirect\StoreRedirectRequest;
use App\Models\Redirect\Redirect;

class RedirectController extends Controller
{

    /**
     * @param Redirect $redirect
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Redirect $redirect)
    {

        return view('redirect.index', [
            'model' => $redirect->paginate(10),
        ]);

    }

    /**
     * @param Redirect $redirect
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Redirect $redirect)
    {

        return view('redirect.form', [
            'model' => $redirect,
        ]);

    }

    /**
     * @param StoreRedirectRequest $request
     * @param StoreRedirectHandler $handler
     * @param Redirect $redirect
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRedirectRequest $request, StoreRedirectHandler $handler, Redirect $redirect)
    {

        if ($redirect = $handler->process($request))
        {
            return redirect()->route('redirect.index')->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * @param Redirect $redirect
     * @return void
     */
    public function show(Redirect $redirect)
    {
        //
    }

    /**
     * @param Redirect $redirect
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Redirect $redirect)
    {

        return view('redirect.form', [
            'model' => $redirect,
        ]);

    }

    /**
     * @param StoreRedirectRequest $request
     * @param StoreRedirectHandler $handler
     * @param Redirect $redirect
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreRedirectRequest $request, StoreRedirectHandler $handler, Redirect $redirect)
    {

        if ($redirect = $handler->process($request, $redirect))
        {
            return redirect()->route('redirect.index')->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());
    }

    /**
     * @param Redirect $redirect
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Redirect $redirect)
    {

        if ($redirect->delete())
        {

            return redirect()->route('redirect.index')->with('message', __( 'Сохранено' ));

        }

        return back()->withErrors([__('Не удалось удалить запись')]);

    }
}
