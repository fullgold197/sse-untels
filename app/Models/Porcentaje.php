<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Porcentaje extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "porcentaje"; // hace referencia a la tabla cliente de la bd
    public $primaryKey = "id";
    public $filiable = [
        'nombre', 'porcentaje'
    ];

}
