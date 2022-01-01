<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestria extends Model
{
    public $table = "maestria"; // hace referencia a la tabla cliente de la bd
    public $primaryKey = "id_maestria";
    public $filiable = [
        'grado_academico', 'pais', 'tipo_estudio', 'institución', 'fecha_inicial', 'fecha_final', 'matricula', 'created_at', 'updated_at'
    ];
    public $timestamps = false;
}
