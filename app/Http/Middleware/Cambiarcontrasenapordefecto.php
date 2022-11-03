<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Cambiarcontrasenapordefecto
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
        if (Auth::check()) {
            //Verifica al usuario si inicia sesion y si se cumple la condicion te redirecciona hacia la vista del usuario. Esto es valido para todas las vistas que sean necesarias.
            if (Auth::user()->estadocontrasena =='null') {
                return redirect()->route('cambiarcontrasenapordefecto.index');
            } else if(Auth::user()->estadocontrasena =='modificado') {
                //caso contrario te regresa a la vista login si no se inicia sesion
                return $next($request);
            }
            //si se cumple la condicion te redirecciona hacia la vista del admin
            else{
                return redirect('/login');

            }

        }
    }
}
