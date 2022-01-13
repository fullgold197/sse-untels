<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminEgresadoCreateRequest;
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

        $texto=trim($request->get('texto'));
        //trae de la tabla $egresados todo los campos
        $tipo_filtrado= $request->get('tipo_filtrado');
        $orden= $request->get('orden');
        if($tipo_filtrado==NULL || $orden== NULL){
            $tipo_filtrado='ap_paterno';
            $orden='asc';
        } else{
            $tipo_filtrado = $request->get('tipo_filtrado');
            $orden = $request->get('orden');
        }
        /* return $orden; */
        $egresados=DB::table('egresado')
        ->join('academico', 'academico.id_academico', '=', 'egresado.id_academico')
        ->select('egresado.matricula', 'egresado.ap_paterno', 'egresado.ap_materno', 'egresado.nombres','egresado.grado_academico' , 'egresado.dni','egresado.genero','egresado.fecha_nacimiento', 'egresado.año_ingreso', 'egresado.semestre_ingreso','egresado.año_egreso' ,'egresado.semestre_egreso', 'egresado.celular', 'egresado.pais_origen', 'egresado.departamento_origen', 'egresado.pais_residencia', 'egresado.ciudad_residencia', 'egresado.lugar_residencia', 'egresado.linkedin','egresado.url','egresado.habilitado', 'egresado.created_at', 'egresado.updated_at', 'academico.id_academico', 'academico.carr_profesional')
        ->where('matricula', 'LIKE', '%' . $texto . '%')
        ->orwhere('ap_paterno','LIKE','%'.$texto.'%')
        ->orwhere('ap_materno', 'LIKE', '%' . $texto . '%')
        ->orWhere('nombres', 'LIKE', '%'.$texto.'%')
        ->orWhere('semestre_ingreso', 'LIKE', '%'.$texto.'%')
        ->orwhere('semestre_egreso', 'LIKE', '%' . $texto . '%')
        ->orWhere('carr_profesional', 'LIKE', '%'. $texto.'%')
        ->orWhere('dni', 'LIKE', '%' . $texto . '%')
        ->orWhere('celular', 'LIKE', '%' . $texto . '%')
        ->orderBy($tipo_filtrado, $orden)
        ->paginate(5);


       /*  */

         return view('admin.egresado.index',compact('egresados','texto', 'tipo_filtrado', 'orden'),[ 'valor2' => $string ]);


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

        $egresados->año_ingreso = $request->input('año_ingreso');
        $egresados->semestre_ingreso = $request->input('semestre_ingreso');
        $egresados->año_egreso = $request->input('año_egreso');
        $egresados->semestre_egreso  = $request->input('semestre_egreso');
        $egresados->celular = $request->input('celular');
        $egresados->pais_origen = $request->input('pais_origen');

        $egresados->departamento_origen = $request->input('departamento_origen');
        $egresados->pais_residencia  = $request->input('pais_residencia');
        $egresados->ciudad_residencia = $request->input('ciudad_residencia');
        $egresados->lugar_residencia = $request->input('lugar_residencia');

        $egresados->id_academico =$request->input('id_academico');
        $egresados->habilitado = 0;
        $egresados->save();






        /* return $egresados; */
        return back()->withInput();
        /* return redirect()->route('egresado.index'); */
        /* $path = $_SERVER['HTTP_REFERER'];
        return redirect($path); */

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

        $egresados->año_ingreso = $request->input('año_ingreso');
        $egresados->semestre_ingreso = $request->input('semestre_ingreso');
        $egresados->año_egreso = $request->input('año_egreso');
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
        /* $path = $_SERVER['HTTP_REFERER'];
        return redirect($path); */
        /* return redirect()->route('egresado.index'); */
        return back()->withInput();
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
        return back()->withInput();
        /* $path=$_SERVER['HTTP_REFERER'];
        return redirect($path); */
        /* return redirect()->route('egresado.index'); */
    }
    //funcion para exportar datos a formato PDF esta ubicado ahora en ReporteAdminController

}
