<?php

namespace App\Http\Controllers;

use App\Models\Egresado;
use App\Models\Porcentaje;
use App\Models\PorcentajeDoctorado;
use Illuminate\Http\Request;

class PorcentajeDoctoradoController extends Controller
{
    public function index()
    {



        $total_egresados = Egresado::count();
        $maestrias = Egresado::where('cant_maestrias', '>', 0)->count();
        $porc_maestrias = ($maestrias / $total_egresados) * 100;

        $doctorados = Egresado::where('cant_doctorados', '>', 0)->count();
        $porc_doctorados = ($doctorados / $total_egresados) * 100;
        $puntos = [];

        //para agregar la cantidad de maestrias es necesario usar el findOrFail junto con el Auth::user
        $egresados = PorcentajeDoctorado::findOrFail(1);
        $egresados->porcentaje = $porc_doctorados; //suma la cantidad de doc más 1
        $egresados->save();


        $egresados = PorcentajeDoctorado::findOrFail(2);
        $egresados->porcentaje = 100 - $porc_doctorados; //suma la cantidad de doc más 1
        $egresados->save();

        $egresados = PorcentajeDoctorado::all();

        foreach ($egresados as $egresado) {
            $puntos[] = ['name' => $egresado['nombre'], 'y' => floatval($egresado['porcentaje'])];
        }

        /* return $porc_doctorados; */
        return view('admin.egresado.graficos_doctorado', ["data" => json_encode($puntos)]);
    }
}
