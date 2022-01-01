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
            'semestre_ingreso'      =>$row['8'],
            'semestre_egreso'       =>$row['9'],
            'celular'               =>$row['10'],
            'pais_origen'           =>$row['11'],
            'departamento_origen'   =>$row['12'],
            'pais_residencia'       =>$row['13'],
            'ciudad_residencia'     =>$row['14'],
            'lugar_residencia'      =>$row['15'],
            'id_academico'          =>$row['16']

        ]);
    }
}
