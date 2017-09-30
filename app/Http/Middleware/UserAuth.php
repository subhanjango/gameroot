<?php

namespace App\Http\Middleware;

use Closure;

class UserAuth
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
          if (!$request->session()->exists('User')) {
            // user value cannot be found in session
            return redirect('/Users');
        }
        return $next($request);
    }
}
