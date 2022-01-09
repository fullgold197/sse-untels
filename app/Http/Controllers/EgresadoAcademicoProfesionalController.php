<?php

namespace App\Http\Controllers;

use App\Models\Academico;
use App\Models\Egresado;
use App\Models\Maestria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EgresadoAcademicoProfesionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $matricula_id = $request->input('matricula_id');
    /*     $egresado=Egresado::findOrFail($request->input('matricula_id')); */
        $egresados0 = DB::table('egresado')
        ->join('users', 'users.egresado_matricula', '=', 'egresado.matricula')
        ->join('academico', 'academico.id_academico', '=', 'egresado.id_academico')
        ->select('users.url','egresado.matricula', 'egresado.ap_paterno', 'egresado.ap_materno', 'egresado.nombres','egresado.grado_academico' , 'egresado.dni','egresado.genero', 'egresado.fecha_nacimiento', 'egresado.año_ingreso' ,'egresado.semestre_ingreso', 'egresado.año_egreso', 'egresado.semestre_egreso', 'egresado.celular', 'egresado.pais_origen', 'egresado.departamento_origen', 'egresado.pais_residencia', 'egresado.ciudad_residencia', 'egresado.lugar_residencia', 'egresado.linkedin', 'users.url', 'academico.id_academico', 'academico.carr_profesional')
        ->where('matricula', $matricula_id)
        ->get();

        $egresados1 = DB::table('maestria')
        ->select('grado_academico', 'pais', 'institución', 'fecha_inicial', 'fecha_final')
        ->where('matricula', $matricula_id)
        ->get();

        $egresados2 = DB::table('doctorado')
        ->select('grado_academico', 'pais', 'institución', 'fecha_inicial', 'fecha_final')
        ->where('matricula', $matricula_id)
        ->get();

        $egresados3 = DB::table('profesion')
        ->select('empresa', 'actividad_empresa', 'puesto', 'nivel_experiencia', 'area_puesto', 'subarea', 'pais', 'fecha_inicio', 'fecha_finalizacion', 'descripcion_responsabilidades', 'sueldo')
        ->where('matricula', $matricula_id)
        ->get();

       /*  return $egresados0; */
        return view('admin.egresado.egresado_academico_profesional',compact('egresados0', 'egresados1', 'egresados2', 'egresados3'));

/* return $egresado; devuelve un arreglo(findOrfail) pero no de objetos asi que no necesita ser iterado en un forearch
 */}

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
    public function edit($matricula)
    {
        /* $egresados = Egresado::findOrFail($matricula);
        //return $cliente;
        return view('c.edit', compact('egresados')); */
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
