<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Egresado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use Symfony\Component\HttpFoundation\File\File;

class DatosPersonalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $egresados = DB::table('egresado')
        ->join('users', 'egresado.matricula', '=', 'users.egresado_matricula')
        ->select('egresado.matricula', 'egresado.ap_paterno', 'egresado.ap_materno', 'egresado.nombres', 'egresado.genero', 'egresado.fecha_nacimiento', 'egresado.año_ingreso', 'egresado.semestre_ingreso', 'egresado.año_egreso', 'egresado.semestre_egreso','egresado.celular', 'egresado.pais_origen', 'egresado.departamento_origen', 'egresado.pais_residencia', 'egresado.ciudad_residencia', 'egresado.lugar_residencia', 'egresado.dni', 'egresado.linkedin', 'users.email', 'users.email_personal','egresado.url', 'egresado.grado_academico', 'users.id')->where('matricula', Auth::user()->egresado_matricula)->get();
        /* return $users; */
        return view('users.datospersonales', compact('egresados'));
        /* return view('users.datospersonales', compact('egresados'))->share('layouts.egresado'); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 0;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return 0;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 0;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 0;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $matricula)
    {
        $egresado_id = DB::table('users')
        ->select('id')
        ->where('egresado_matricula', $matricula)
        ->get();
        foreach ($egresado_id as $id) {
            $id_egresado = $id->id;
        }
        request()->validate([
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore(User::findOrFail($id_egresado)),
            ],
            'email_personal' => [
                'nullable',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore(User::findOrFail($id_egresado)),
            ],
            'genero' => ['nullable'],
            'fecha_nacimiento' => ['nullable'],
            'año_ingreso' => ['nullable','numeric','digits:4'],
            'semestre_ingreso' => ['nullable','numeric','digits:1'],
            'año_egreso' => ['nullable','numeric','digits:4'],
            'semestre_egreso' => ['nullable','numeric','digits:1'],
            'celular' => ['nullable','numeric','digits:9'],
            'pais_origen' => 'nullable|string|max:50',
            'departamento_origen' => 'nullable|string|max:50',
            'pais_residencia' => 'nullable|string|max:50',
            'ciudad_residencia' => 'nullable|string|max:50',
            'lugar_residencia' => 'nullable|string|max:255',
            'linkedin' => ['nullable','string'],
        ],
            [

            ]);

        $egresados = Egresado::findOrFail($matricula);
        $egresados->genero = $request->input('genero');
        $egresados->fecha_nacimiento = $request->input('fecha_nacimiento');
        $egresados->año_ingreso = $request->input('año_ingreso');
        $egresados->semestre_ingreso = $request->input('semestre_ingreso');
        $egresados->año_egreso = $request->input('año_egreso');
        $egresados->semestre_egreso  = $request->input('semestre_egreso');
        $egresados->celular = $request->input('celular');
        $egresados->pais_origen = $request->input('pais_origen');
        $egresados->departamento_origen = $request->input('departamento_origen');
        $egresados->pais_residencia = $request->input('pais_residencia');
        $egresados->ciudad_residencia = $request->input('ciudad_residencia');
        $egresados->lugar_residencia = $request->input('lugar_residencia');
        $egresados->linkedin = $request->input('linkedin');
        $egresados->save();

        DB::table('users')
        ->where('egresado_matricula', Auth::user()->egresado_matricula)  // find your user by their email
        ->limit(1)  // optional - to ensure only one record is updated.
        ->update(array('email' => $request->input('email')));  // update the record in the DB.

        //Correo personal
        DB::table('users')
        ->where('egresado_matricula', Auth::user()->egresado_matricula)  // find your user by their email
        ->limit(1)  // optional - to ensure only one record is updated.
        ->update(array('email_personal' => $request->input('email_personal')));  // update the record in the DB.
        return 0;
        /* return redirect()->route('datos-personales.index'); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 0;
    }
}
