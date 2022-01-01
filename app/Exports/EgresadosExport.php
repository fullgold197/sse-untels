<?php

namespace App\Exports;

use App\Models\Egresado;
use Maatwebsite\Excel\Concerns\FromCollection;

class EgresadosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Egresado::select('matricula','ap_paterno', 'ap_materno', 'nombres', 'grado_academico', 'dni','genero', 'fecha_nacimiento', 'semestre_ingreso', 'semestre_egreso', 'celular', 'pais_origen', 'departamento_origen', 'pais_residencia','ciudad_residencia','lugar_residencia','id_academico')->get();
    }
}
