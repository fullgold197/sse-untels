<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Egresado;
use App\Models\Porcentaje;

class GraficosEgresadosAdminController extends Controller
{
    //

    public function index(){


    $egresados=Porcentaje::all();

    $puntos = [];
    foreach($egresados as $egresado){
        $puntos[]=['name'=>$egresado['nombre'],'y'=>floatval($egresado['porcentaje'])];
        }
    /* return $puntos; */
    return view('admin.egresado.graficos',["data"=>json_encode($puntos)]);

}


}
