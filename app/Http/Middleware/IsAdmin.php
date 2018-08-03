<?php

namespace App\Http\Middleware;

use User;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$admin)
    {
        if(Auth::check() && Auth::user()->authorizeRoles($admin)) {
            return $next($request);
        }
        return redirect()->route('admin.dashboard')->withErrors('Acces Denied');
    }
}
