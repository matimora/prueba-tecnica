<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class hasrole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
      /*  if(Auth::user()!= null){
            if(!$request->user()->hasRole($role)){
                abort(403,'Permission Dennied');
            }
            else{
                return $next($request);
            }
        }
        return $next($request);*/
    }
}
