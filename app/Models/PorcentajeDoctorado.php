<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PorcentajeDoctorado extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "porcentaje_doctorado"; // hace referencia a la tabla cliente de la bd
    public $primaryKey = "id";
    public $filiable = [
        'nombre', 'porcentaje'
    ];
}
