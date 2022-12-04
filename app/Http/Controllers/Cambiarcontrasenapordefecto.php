<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

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
        $value = $request->get('contrasenaactual');
        $rules = [
            'contrasenaactual'=>['required',
            function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('El campo contraseña actual es incorrecto.');
                }
            },
        ],
            'password' => 'required|min:8',
            'repitanuevacontrasena' => 'required|min:8|same:password',
        ];

        $messages = [
            'repitanuevacontrasena.same' => 'La confirmación de la contraseña debe coincidir con la nueva contraseña',
            'repitanuevacontrasena.required' => 'El campo confirmar nueva contraseña es obligatorio.',
            'repitanuevacontrasena.min' => 'El campo repita nueva contraseña debe contener al menos 8 caracteres.',
            'password.required' => 'El campo nueva contraseña es obligatorio.',
            'password.min' => 'El campo nueva contraseña debe contener al menos 8 caracteres.',
            'contrasenaactual.required'=>'El campo contraseña actual es obligatorio.'

        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator-> messages());
        }
        else{
            if(Hash::check($request->contrasenaactual,Auth::user()->password)){
                $user= new User;
                $user->where('dni','=',Auth::user()->dni)
                ->update(['password'=>bcrypt($request->password),
                           'estadocontrasena'=>'modificado',
            ]);
/*             return redirect('/login')->with('status','Contraseña cambiada con exito'); */
            Auth::logout(); //cierra sesion primero (esto hace uso de la ruta logout en web.php)
            //return redirect('/login')->with('status','Contraseña cambiada con exito');
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
