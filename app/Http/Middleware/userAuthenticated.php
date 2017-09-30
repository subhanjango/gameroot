<?php

namespace App\Http\Middleware;

use Closure;

class userAuthenticated
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
         if ($request->session()->exists('User')) {
            // user value can be found in session
            return redirect('/Users/dashboard');
        }
        return $next($request);
    }
}
