<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminApiMiddleware
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
        if(Auth::check())
        {
            //Verifica al usuario si inicia sesion y si se cumple la condicion te redirecciona hacia la vista del admin
            if(Auth::user()->role_as == '1' and Auth::user()->estado == '1')
            {
                return $next($request);

            } else
            {
                //caso contrario te regresa a la vista login si no se inicia sesion
                return response()->json([
                    'message'=>'Usted es un egresado, no moleste por favor.'
                ]);
            }
            //si se cumple la condicion te redirecciona hacia la vista del admin

        }
    }
}
