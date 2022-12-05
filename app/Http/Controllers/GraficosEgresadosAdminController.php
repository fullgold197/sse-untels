<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Egresado;
use App\Models\Maestria;
use App\Models\Porcentaje;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GraficosEgresadosAdminController extends Controller
{
    //

    public function index(){



    /* $total_egresados = Egresado::count(); */
    $total_egresados = DB::table('egresado')
                        /* ->where('cant_maestrias','>',0) */
                        ->where('id_academico', Auth::user()->id_academico)
                        ->count();

    /* $maestrias = Egresado::where('cant_maestrias','>',0)->count(); */
    $maestrias = DB::table('egresado')
                ->where('cant_maestrias','>',0)
                ->where('id_academico', Auth::user()->id_academico)
                ->count();

    $porc_maestrias= ($maestrias/ $total_egresados) * 100;

    /* $doctorados = Egresado::where('cant_doctorados', '>', 0)->count(); */
    /* $doctorados = DB::table('egresado')
                ->where('cant_doctorados','>',0)
                ->where('id_academico', Auth::user()->id_academico)
                ->count(); */

    /* $porc_doctorados = ($doctorados / $total_egresados)*100; */
    /* return $porc_maestrias; */
    /* return $porc_doctorados; */
    $puntos = [];

    //para agregar la cantidad de maestrias es necesario usar el findOrFail junto con el Auth::user
    /* $egresados = Porcentaje::findOrFail(1);
    $egresados->porcentaje = $porc_maestrias; //suma la cantidad de doc más 1
    $egresados->save(); */

    /* $egresados = Porcentaje::findOrFail(2);
    $egresados->porcentaje = 100-$porc_maestrias; //suma la cantidad de doc más 1
    $egresados->save(); */

    /* $egresados = Porcentaje::all(); */
    $egresados = array (
        array(
            "id" => "1",
            "nombre" => "Maestria",
            "porcentaje" => $porc_maestrias,
        ),
        array(
            "id" => "2",
            "nombre" => "Sin maestria",
            "porcentaje" => 100-$porc_maestrias,
        ),
      );

        /* return $cars; */
    /* foreach($egresados as $egresado){ */
    foreach($egresados as $egresado){
        $puntos[]=['name'=>$egresado['nombre'],'y'=>floatval($egresado['porcentaje'])];
        }

    /* return $porc_doctorados; */
    return view('admin.datos_estadistiscos.graficos_maestria',["data"=>json_encode($puntos)]);

}


}
