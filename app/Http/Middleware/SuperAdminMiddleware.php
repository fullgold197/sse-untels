<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if((Auth::user()->role_as == '2' or Auth::user()->role_as == '1') and Auth::user()->estado == '1')
            {
                return $next($request);

            }/* elseif(Auth::user()->role_as == '2' and Auth::user()->estado == '1'){
                return $next($request);
            } */
            else
            {
                //caso contrario te regresa a la vista login si no se inicia sesion
                return redirect('/login');
            }
            //si se cumple la condicion te redirecciona hacia la vista del admin
    }
}
