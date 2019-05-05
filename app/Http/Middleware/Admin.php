<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Closure;

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
        $user = Auth::user();
        if($user->rol_id != 1){
            Session::flash("message-info","No posee los permisos necesarios.");
            return Redirect::to("usuarios");
        }
        return $next($request);
    }
}
