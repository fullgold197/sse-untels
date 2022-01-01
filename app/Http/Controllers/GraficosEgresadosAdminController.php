<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Egresado;

class GraficosEgresadosAdminController extends Controller
{
    //

    public function index(){

$puntos=[];
$egresados=Egresado::all();
foreach($egresados as $egresado){
    $puntos[]=['nombre_egresado'=>$egresado['nombres'],'y'=>61.4];
    }
/* return $puntos; */
return view('admin.egresado.graficos',["data"=>json_encode($puntos)]);

}


}
