<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class bde
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
        if(Auth::check()){
            if (Auth::user()->rank == 1) {
                return $next($request);
            }

        }
        return redirect(abort(403,"Accès non autorisé"));
    }
}
