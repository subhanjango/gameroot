<?php

namespace App\Http\Middleware;

use Closure;

class ifLoggedIn
{

    public function handle($request, Closure $next)
    {
        if (!$request->session()->exists('UserID')) {
            // user value cannot be found in session
            return redirect('/');
        }

        return $next($request);
    }

}