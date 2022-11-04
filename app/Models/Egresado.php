<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egresado extends Model
{

    public $table = 'egresado'; // hace referencia a la tabla cliente de la bd
    protected $primaryKey = 'matricula';
    public $fillable = [
        'matricula','ap_paterno','ap_materno','nombres','id_academico','grado_academico','dni',
        'genero','fecha_nacimiento','url','año_ingreso','semestre_ingreso','año_egreso', 'semestre_egreso','celular','pais_origen', 'departamento_origen','pais_residencia',
        'ciudad_residencia', 'lugar_residencia', 'linkedin', 'habilitado','primer_empleo_id', 'created_at','updated_at'
    ];
    public $timestamps = true;
    //use HasFactory;

}

