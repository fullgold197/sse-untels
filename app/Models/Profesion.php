<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
    public $table = "profesion"; // hace referencia a la tabla cliente de la bd
    public $primaryKey = "id_profesion";
    public $filiable = [
        'empresa', 'actividad_empresa', 'puesto', 'nivel_experiencia', 'area_puesto',
        'subarea', 'pais', 'fecha_inicio', 'fecha_finalizacion', 'descripcion_responsabilidades', 'matricula', 'created_at', 'updated_at'
    ];
    public $timestamps = false;
    /* use HasFactory; */
}
