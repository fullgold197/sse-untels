<?php

namespace App\Imports;

use App\Models\egresado;
use Maatwebsite\Excel\Concerns\ToModel;

class EgresadosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new egresado([
            //
            'matricula'             =>$row['0'],
            'ap_paterno'            =>$row['1'],
            'ap_materno'            =>$row['2'],
            'nombres'               =>$row['3'],
            'grado_academico'       =>$row['4'],
            'dni'                   =>$row['5'],
            'genero'                =>$row['6'],
            'fecha_nacimiento'      =>$row['7'],
            'año_ingreso'           =>$row['8'],
            'semestre_ingreso'      =>$row['9'],
            'año_egreso'            =>$row['10'],
            'semestre_egreso'       =>$row['11'],
            'celular'               =>$row['12'],
            'pais_origen'           =>$row['13'],
            'departamento_origen'   =>$row['14'],
            'pais_residencia'       =>$row['15'],
            'ciudad_residencia'     =>$row['16'],
            'lugar_residencia'      =>$row['17'],
            'id_academico'          =>$row['18']

        ]);
    }
}
