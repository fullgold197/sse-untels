<?php

namespace App\Http\Controllers;

use App\Models\Egresado;
use App\Models\Porcentaje;
use App\Models\PorcentajeDoctorado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PorcentajeDoctoradoController extends Controller
{
    public function index()
    {



        /* $total_egresados = Egresado::count(); */
        $total_egresados = DB::table('egresado')
                        /* ->where('cant_maestrias','>',0) */
                        ->where('id_academico', Auth::user()->id_academico)
                        ->count();

        /* $maestrias = Egresado::where('cant_maestrias', '>', 0)->count();
        $porc_maestrias = ($maestrias / $total_egresados) * 100; */

        /* $doctorados = Egresado::where('cant_doctorados', '>', 0)->count(); */
        $doctorados = DB::table('egresado')
                ->where('cant_doctorados','>',0)
                ->where('id_academico', Auth::user()->id_academico)
                ->count();

        $porc_doctorados = ($doctorados / $total_egresados) * 100;
        $puntos = [];

        //para agregar la cantidad de maestrias es necesario usar el findOrFail junto con el Auth::user
        /* $egresados = PorcentajeDoctorado::findOrFail(1);
        $egresados->porcentaje = $porc_doctorados; //suma la cantidad de doc más 1
        $egresados->save(); */


        /* $egresados = PorcentajeDoctorado::findOrFail(2);
        $egresados->porcentaje = 100 - $porc_doctorados; //suma la cantidad de doc más 1
        $egresados->save(); */

        /* $egresados = PorcentajeDoctorado::all(); */
        $egresados = array (
            array(
                "id" => "1",
                "nombre" => "Doctorado",
                "porcentaje" => $porc_doctorados,
            ),
            array(
                "id" => "2",
                "nombre" => "Sin doctorado",
                "porcentaje" => 100-$porc_doctorados,
            ),
          );
        /* return $egresados; */
        foreach ($egresados as $egresado) {
            $puntos[] = ['name' => $egresado['nombre'], 'y' => floatval($egresado['porcentaje'])];
        }

        /* return $porc_doctorados; */
        return view('admin.datos_estadistiscos.graficos_doctorado', ["data" => json_encode($puntos)]);
    }
}
