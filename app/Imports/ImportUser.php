<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportUser implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row['5']) {
            return new User([
                'name'   => $row['3'],
                'email'  => $row['0']."@untels.edu.pe",
                'password' => Hash::make($row['5']),
                'role_as'  => "0",
                'estado'  => "1",
                'estadocontrasena'  => "null",
                'egresado_matricula'  => $row['0'],
                'id_academico'  => Auth::user()->id_academico,
                'dni'  => $row['5'],
            ]);
        }


    }
    public function startRow(): int
    {
        return 2;
    }
}
