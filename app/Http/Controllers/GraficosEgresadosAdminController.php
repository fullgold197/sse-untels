<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Egresado;
use App\Models\Maestria;
use App\Models\Porcentaje;

class GraficosEgresadosAdminController extends Controller
{
    //

    public function index(){



    $total_egresados = Egresado::count();
    $maestrias = Egresado::where('cant_maestrias','>',0)->count();
    $porc_maestrias= ($maestrias/ $total_egresados) * 100;

    $doctorados = Egresado::where('cant_doctorados', '>', 0)->count();
    $porc_doctorados = ($doctorados / $total_egresados)*100;
    $puntos = [];

    //para agregar la cantidad de maestrias es necesario usar el findOrFail junto con el Auth::user
    $egresados = Porcentaje::findOrFail(1);
    $egresados->porcentaje = $porc_maestrias; //suma la cantidad de doc más 1
    $egresados->save();

    $egresados = Porcentaje::findOrFail(2);
    $egresados->porcentaje = 100-$porc_maestrias; //suma la cantidad de doc más 1
    $egresados->save();

    $egresados = Porcentaje::all();

    foreach($egresados as $egresado){
        $puntos[]=['name'=>$egresado['nombre'],'y'=>floatval($egresado['porcentaje'])];
        }

    /* return $porc_doctorados; */
    return view('admin.datos_estadistiscos.graficos_maestria',["data"=>json_encode($puntos)]);

}


}
