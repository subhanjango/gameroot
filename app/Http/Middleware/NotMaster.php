<?php

namespace App\Http\Middleware;

use Closure;
use Admin;
class NotMaster
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
        $Admin=\Session::get('UserID');

        if($Admin != 1 ){
            \Session::flash('error','Error! You dont have access to this route..');
            return back();
        }
        return $next($request);
    }
}
