<?php

namespace App\Exports;

use App\Models\Egresado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EgresadosExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //selecciona todos los campos de la tabla egresado
        $egresados = DB::table('egresado')
        ->join('academico', 'academico.id_academico', '=', 'egresado.id_academico')
        ->join('users', 'users.egresado_matricula', '=', 'egresado.matricula')
        ->select('egresado.matricula', 'egresado.ap_paterno', 'egresado.ap_materno', 'egresado.nombres', 'academico.carr_profesional','egresado.grado_academico', 'egresado.dni', 'egresado.genero', 'egresado.fecha_nacimiento', 'egresado.año_ingreso', 'egresado.semestre_ingreso', 'egresado.año_egreso', 'egresado.semestre_egreso', 'egresado.celular', 'egresado.pais_origen', 'egresado.departamento_origen', 'egresado.pais_residencia', 'egresado.ciudad_residencia', 'egresado.lugar_residencia','users.email_personal')
        ->where('egresado.id_academico',Auth::user()->id_academico)
        ->get();
        return $egresados; //aqui envia todos los datos seleccionados

    }
    public function headings(): array
    {
        return [
            'Código',
            'Ap.Paterno',
            'Ap.Materno',
            'Nombres',
            'Carrera',
            'Grado Académico',
            'DNI',
            'Género',
            'Año de nacimiento',
            'Semestre ingreso',
            'Ciclo ingreso',
            'Semestre egreso',
            'Ciclo egreso',
            'Celular',
            'País nacimiento',
            'Provincia nacimiento',
            'País residencia',
            'Ciudad residencia',
            'Dirección residencia',
            'Email personal',
        ];
    }
}
