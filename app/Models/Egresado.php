<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egresado extends Model
{

    public $table = "egresado"; // hace referencia a la tabla cliente de la bd
    public $primaryKey = "matricula";
    public $fillable = [
        'matricula','ap_paterno', 'ap_materno', 'nombres', 'grado_academico', 'dni',
        'genero', 'fecha_nacimiento', 'url', 'semestre_ingreso', 'semestre_egreso', 'celular', 'pais_origen', 'departamento_origen', 'pais_residencia',
        'ciudad_residencia', 'lugar_residencia', 'linkedin', 'habilitado', 'primer_empleo_id ','id_academico ', 'created_at', 'updated_at'
    ];
    public $timestamps = false;
    //use HasFactory;

}

