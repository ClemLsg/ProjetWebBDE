<?php

namespace App\Http\Middleware;

use Closure;

class cesi
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
            if (Auth::user()->rank == 2) {
                return $next($request);
            }

        }
        return redirect(abort(403,"Accès non autorisé"));
    }
}
