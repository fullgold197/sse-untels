<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Egresado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        ->select('egresado.matricula', 'egresado.ap_paterno', 'egresado.ap_materno', 'egresado.nombres', 'egresado.genero', 'egresado.fecha_nacimiento', 'egresado.celular', 'egresado.dni', 'users.url', 'users.id')->where('matricula', Auth::user()->egresado_matricula)->get();
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
    public function update(Request $request, $matricula)
    {
        
        $egresados = Egresado::findOrFail($matricula);
        $egresados->ap_paterno = $request->input('ap_paterno');
        $egresados->ap_materno = $request->input('ap_materno');
        $egresados->nombres = $request->input('nombres');
        $egresados->genero = $request->input('genero');
        $egresados->celular = $request->input('celular');
        $egresados->fecha_nacimiento = $request->input('fecha_nacimiento');
        $egresados->save();
            /* return $url; */
        return redirect()->route('datos-personales.index');
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
