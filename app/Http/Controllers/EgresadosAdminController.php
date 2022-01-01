<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EgresadoCreateRequest;
use App\Models\Egresado;
use App\Models\User;
use Illuminate\Validation\Rule;
use App\Http\Requests\EgresadoEditRequest;
use App\Models\Carrera;
use Illuminate\Support\Facades\Hash;
use PDF;

class EgresadosAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if( $request->texto == "" ){
        $string = "empty";

    }
        else{
        $string = $request->texto;


        }


        $texto=$request->get('texto');
        //trae de la tabla egresa$egresados todo los campos
        $egresados=DB::table('egresado')
        ->join('academico', 'academico.id_academico', '=', 'egresado.id_academico')
        ->join('users', 'users.egresado_matricula', '=', 'egresado.matricula')
        ->select('egresado.matricula', 'egresado.ap_paterno', 'egresado.ap_materno', 'egresado.nombres','egresado.grado_academico' , 'egresado.dni','egresado.genero', 'egresado.fecha_nacimiento', 'egresado.semestre_ingreso', 'egresado.semestre_egreso', 'egresado.celular', 'egresado.pais_origen', 'egresado.departamento_origen', 'egresado.pais_residencia', 'egresado.ciudad_residencia', 'egresado.lugar_residencia', 'egresado.linkedin', 'users.url', 'academico.id_academico', 'academico.carr_profesional')
        ->where('ap_paterno','LIKE','%'.$texto.'%')
        ->orWhere('nombres', 'LIKE', '%'.$texto.'%')
        ->orWhere('matricula', 'LIKE', '%'.$texto.'%')
        ->orderBy('ap_paterno','asc')
        ->paginate(5);
        /* return $egresados; */

         return view('admin.egresado.index',compact('egresados','texto'),[ 'valor2' => $string ]);


}

    public function TrayectoriaAcademicaindex(Request $request)
    {
        $egresados = new Egresado;
        $egresados->matricula = $request->input('matricula');
        $egresados->ap_paterno = $request->input('ap_paterno');
        $egresados->ap_materno = $request->input('ap_materno');
        $egresados->nombres = $request->input('nombres');
        $egresados->genero = $request->input('genero');
        $egresados->fecha_nacimiento = $request->input('fecha_nacimiento');
        $egresados->telefono = $request->input('telefono');
        $egresados->id_academico = $request->input('telefono');
        $egresados->save();


        /* return $egresados; */
        return redirect()->route('egresado.index');
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
    public function store(EgresadoCreateRequest $request)
    {
        //

        $egresados=new Egresado;

        $egresados->matricula = $request->input('matricula');
        $egresados->ap_paterno = $request->input('ap_paterno');
        $egresados->ap_materno = $request->input('ap_materno');
        $egresados->nombres = $request->input('nombres');


        $egresados->dni= $request->input('dni');
        $egresados->genero = $request->input('genero');
        $egresados->fecha_nacimiento = $request->input('fecha_nacimiento');

        $egresados->semestre_ingreso = $request->input('semestre_ingreso');
        $egresados->semestre_egreso  = $request->input('semestre_egreso');
        $egresados->celular = $request->input('celular');
        $egresados->pais_origen = $request->input('pais_origen');

        $egresados->departamento_origen = $request->input('departamento_origen');
        $egresados->pais_residencia  = $request->input('pais_residencia');
        $egresados->ciudad_residencia = $request->input('ciudad_residencia');
        $egresados->lugar_residencia = $request->input('lugar_residencia');
        $egresados->linkedin = $request->input('linkedin');
        $egresados->id_academico =$request->input('id_academico');

        $egresados->save();

        $usuarios = new User;
        $usuarios->name = $request->input('nombres');
        $usuarios->dni = $request->input('dni');
        $usuarios->email = $request->input('matricula').'@untels.edu.pe';
        $usuarios->egresado_matricula = $request->input('matricula');
        $usuarios->password = Hash::make($request->input('dni'));
        $usuarios->save();
        /* return $egresados; */
        return redirect()->route('egresado.index');

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
        //

       /*  $egresados=Egresado::findOrFail($matricula);

        //return $egresados;
        return view('admin.egresado.edit',compact('egresados'));
        //No se utiliza este metodo, en admin.egresado.index se @include('admin.egresado.edit') y esta vista envia los datos a egresado.update
        */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EgresadoEditRequest $request,$matricula)
    {
        //
        /* $data=$request->validate([
            'matricula' => ['required',Rule::unique('egresado')->ignore($user->id), 'matricula']
        ]); */
        $egresados=Egresado::findOrFail($matricula);
        $egresados->matricula = $request->input('matricula');
        $egresados->ap_paterno = $request->input('ap_paterno');
        $egresados->ap_materno = $request->input('ap_materno');
        $egresados->nombres = $request->input('nombres');


        $egresados->dni = $request->input('dni');
        $egresados->genero = $request->input('genero');
        $egresados->fecha_nacimiento = $request->input('fecha_nacimiento');

        $egresados->semestre_ingreso = $request->input('semestre_ingreso');
        $egresados->semestre_egreso  = $request->input('semestre_egreso');
        $egresados->celular = $request->input('celular');
        $egresados->pais_origen = $request->input('pais_origen');

        $egresados->departamento_origen = $request->input('departamento_origen');
        $egresados->pais_residencia  = $request->input('pais_residencia');
        $egresados->ciudad_residencia = $request->input('ciudad_residencia');
        $egresados->lugar_residencia = $request->input('lugar_residencia');
        $egresados->linkedin = $request->input('linkedin');
        $egresados->id_academico=$request->input('id_academico');

        $egresados->save();
        /* return $egresados; */
        $matricula_id= $egresados->matricula;
        return redirect()->route('egresado.index',['matricula_id'=>$matricula_id]);

        //return $matricula_id; si envia el id
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($matricula)
    {
        //
        $egresados = Egresado::findOrFail($matricula);
        $egresados->delete();
        return redirect()->route('egresado.index');
    }
    //funcion para exportar datos a formato PDF esta ubicado ahora en ReporteAdminController

}
