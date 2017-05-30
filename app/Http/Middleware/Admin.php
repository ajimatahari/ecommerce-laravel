<?php


namespace App\Http\Middleware;
use Auth;
use Closure;
use Session;


class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isAdmin() ) {
            return $next($request);
        }

        // set flash message
        Session::flash('fail', 'Only the admin can access the page.');

        // redirect user to login
        return route('login');
    }
}
