<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academico extends Model
{
    public $table = "academico"; // hace referencia a la tabla cliente de la bd
    public $primaryKey = "id_academico";
    public $filiable = [
        'carr_profesional', 'grado_academico', 'pais', 'tipo_estudio', 'institución', 'fecha_inicial', 'fecha_final', 'created_at', 'updated_at'
    ];
    public $timestamps = false;
    /* use HasFactory; */
}
