<?php

namespace App\Http\Controllers;

use App\Models\Doctorado;
use App\Models\Egresado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctoradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
       /*  $egresados = new Doctorado();
        $egresados->pais = $request->input('pais');
        $egresados->institución = $request->input('institución');
        $egresados->fecha_inicial = $request->input('fecha_inicial');
        $egresados->fecha_final = $request->input('fecha_final');
        $egresados->id_academico = $request->input('id_academico');
        $egresados->save(); */
        /* return $egresados; */
        /* return redirect()->route('trayectoria-academica.index'); */
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
    public function edit($id_doctorado)
    {
        /* $egresados = Doctorado::findOrFail($id_doctorado);

        /* return $egresados; */
        /* return view('users.modalEgresados.academico_doctorado_edit', compact('egresados')); */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_doctorado)
    {
        $egresados = Doctorado::findOrFail($id_doctorado);
        $egresados->pais = $request->input('doctorado_pais');
        $egresados->institución = $request->input('doctorado_institución');
        $egresados->fecha_inicial = $request->input('doctorado_fecha_inicial');
        $egresados->fecha_final = $request->input('doctorado_fecha_final');
        $egresados->save();
        //return $egresados;
        return redirect()->route('trayectoria-academica.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_doctorado)
    {
        $doctorado = Doctorado::where('matricula', Auth::user()->egresado_matricula)->count(); //cuentas las cantidad de matricula con el id de la matricula

        $egresados = Egresado::findOrFail(Auth::user()->egresado_matricula);
        $egresados->cant_doctorados = --$doctorado; //resta la cant_doctorados menos 1
        $egresados->save();
        //es importante ponerlo antes de $egresados->delete() ya ese comando elimina todos los datos de la variable

        //elimina la fila de la tabla doctorado con el id
        $egresados = Doctorado::findOrFail($id_doctorado);
        $egresados->delete();


        return redirect()->route('trayectoria-academica.index');
    }
}
