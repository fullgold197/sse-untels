<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Cambiarcontrasenapordefecto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('users.cambiar_contrasena_defecto');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       /*  $usuarios = new User;
        $usuarios->estadocontrasena = 'modificado';
        $usuarios->save(); */


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //


        $rules = [
            'contrasenaactual'=>'required',
            'password' => 'required|min:8',
            'repitanuevacontrasena' => 'required|min:8|same:password',
        ];

        $messages = [
            'repitanuevacontrasena.same' => 'La confirmación de la contraseña debe coincidir con la nueva contraseña',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator-> messages());
        }
        else{

            if(Hash::check($request->contrasenaactual,Auth::user()->password)){
                $user= new User;
                $user->where('email','=',Auth::user()->email)
                ->update(['password'=>bcrypt($request->password),
                           'estadocontrasena'=>'modificado',

            ]);
            Auth::logout(); //cierra sesion primero (esto hace uso de la ruta logout en web.php)
            return redirect('/login')->with('status','Contraseña cambiada con exito');
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
