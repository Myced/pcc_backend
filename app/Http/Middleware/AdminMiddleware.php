<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\User;

class AdminMiddleware
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
        if($request->route()->named('login'))
        {
            return $next($request);
        }

        if( request()->is('login') )
        {
            return $next($request);
        }

        if(Auth::check())
        {
            //check that the user is an admin..
            $user = auth()->user();

            if($user->level != User::USER_LEVEL_ADMIN)
            {
                //log them out and send them to login 
                session()->flash("error", 'Unauthorized Access');
                Auth::logout();

                return redirect()->route('login');
            }

            return $next($request);
        }

        
        return redirect()->route('login');
    }
}
