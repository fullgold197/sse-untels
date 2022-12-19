<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

          if(Auth::user()->role_as == '1' or Auth::user()->role_as == '2') //1 = Admin Login
        {
            return redirect('/admin');

        } else if (Auth::user()->role_as == '0' and Auth::user()->estado =='1' and Auth::user()->estadocontrasena == 'null') {
            return view('users.cambiar_contrasena_defecto');

        } else if(Auth::user()->role_as == '0' and Auth::user()->estado =='1'){
            return view('users.home');
        }
        else{
            return redirect('/login')->with('bloqueo','Su cuenta está bloqueada. Por favor, comuniquese con su escuela para más detalles.');
        }


    }

}
