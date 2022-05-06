<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class UserRole extends Middleware
{

    /**
     * @param $request
     * @param Closure $next
     * @param ...$roles
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next, ... $roles)
    {
        if (!Auth::check())
            return redirect('login');

        $user = Auth::user();

        if($user->isAdmin())
            return $next($request);

        return redirect('/');
    }
}
