<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }

        return $next($request);
    }

    // public function handle($request, Closure $next, $role)
    // {
    //     if(!$this->auth->check())
    //     {
    //         return redirect()->to('/login')
    //             ->with('status', 'success')
    //             ->with('message', 'Please login.');
    //     }

    //     if($role == 'all')
    //     {
    //         return $next($request);
    //     }
    //     if( $this->auth->guest() || !$this->auth->user()->hasRole($role))
    //     {
    //         abort(403);
    //     }
    //     return $next($request);
    // }
}
