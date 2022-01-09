<?php

namespace App\Exports;

use App\Models\Egresado;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class EgresadosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //selecciona todos los campos de la tabla egresado
        $egresados = DB::table('egresado')
        ->join('academico', 'academico.id_academico', '=', 'egresado.id_academico')
        ->select('egresado.matricula', 'egresado.ap_paterno', 'egresado.ap_materno', 'egresado.nombres', 'egresado.grado_academico', 'egresado.dni', 'egresado.genero', 'egresado.fecha_nacimiento', 'egresado.año_ingreso', 'egresado.semestre_ingreso', 'egresado.año_egreso', 'egresado.semestre_egreso', 'egresado.celular', 'egresado.pais_origen', 'egresado.departamento_origen', 'egresado.pais_residencia', 'egresado.ciudad_residencia', 'egresado.lugar_residencia', 'academico.carr_profesional')->get();
        return $egresados; //aqui envia todos los datos seleccionados

    }
}
