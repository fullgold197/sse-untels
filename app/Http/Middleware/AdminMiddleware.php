<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
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
                return redirect('/login');
            }
            //si se cumple la condicion te redirecciona hacia la vista del admin


        }
        /* else
        {
            return redirect('/home');
        }
         */
    }
}
//else if (Auth::user()->role_as == '0' and Auth::user()->estado == '1')
