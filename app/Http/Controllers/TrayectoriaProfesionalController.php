<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Egresado;
use App\Models\Profesion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TrayectoriaProfesionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /* $egresados = Profesion::all(); */
        /* return $users; */
        $egresados = DB::table('profesion')
            ->select('id_profesion','empresa', 'actividad_empresa', 'actividad_empresa', 'puesto', 'nivel_experiencia', 'area_puesto', 'subarea', 'pais', 'fecha_inicio', 'fecha_finalizacion', 'descripcion_responsabilidades')
            ->where('matricula', Auth::user()->egresado_matricula)
            ->get();
        /* $egresados = DB::table('profesion')
            ->join('egresado', 'profesion.matricula', '=', 'egresado.matricula')
            ->select('profesion.id_profesion', 'profesion.empresa', 'profesion.actividad_empresa',  'profesion.puesto', 'profesion.nivel_experiencia', 'profesion.area_puesto', 'profesion.subarea', 'profesion.pais', 'profesion.fecha_inicio', 'profesion.fecha_finalizacion', 'profesion.descripcion_responsabilidades')
            ->where('profesion.matricula', Auth::user()->egresado_matricula)
            ->get(); */
        /* return $egresados; */

        return view('users.trayectoriaprofesional', compact('egresados'));
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
        $egresados = new Profesion();
        $egresados->empresa = $request->input('empresa');
        $egresados->actividad_empresa = $request->input('actividad_empresa');
        $egresados->puesto = $request->input('puesto');
        $egresados->nivel_experiencia = $request->input('nivel_experiencia');
        $egresados->area_puesto = $request->input('area_puesto');
        $egresados->subarea = $request->input('subarea');
        $egresados->pais = $request->input('pais');
        $egresados->fecha_inicio = $request->input('fecha_inicio');
        $egresados->fecha_finalizacion = $request->input('fecha_finalizacion');
        $egresados->descripcion_responsabilidades = $request->input('descripcion_responsabilidades');
        $egresados->matricula = Auth::user()->egresado_matricula;
        $egresados->save();
        return redirect()->route('trayectoria-profesional.index');
        /* return $egresados; */
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
    public function edit($id_profesion)
    {
        $egresado = Profesion::findOrFail($id_profesion);
        //return $cliente;
        return view('users.modalEgresados.vistaprofesional', compact('egresado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_profesion)
    {
        $egresados = Profesion::findOrFail($id_profesion);
        $egresados->empresa = $request->input('empresa');
        $egresados->actividad_empresa = $request->input('actividad_empresa');
        $egresados->puesto = $request->input('puesto');
        $egresados->nivel_experiencia = $request->input('nivel_experiencia');
        $egresados->area_puesto = $request->input('area_puesto');
        $egresados->subarea = $request->input('subarea');
        $egresados->pais = $request->input('pais');
        $egresados->fecha_inicio = $request->input('fecha_inicio');
        $egresados->fecha_finalizacion = $request->input('fecha_finalizacion');
        $egresados->descripcion_responsabilidades = $request->input('descripcion_responsabilidades');
        $egresados->save();
        return redirect()->route('trayectoria-profesional.index');
        //return $egresados;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_profesion)
    {
        $egresados = Profesion::findOrFail($id_profesion);
        $egresados->delete();
        return redirect()->route('trayectoria-profesional.index');
    }
}
