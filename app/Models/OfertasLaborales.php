<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfertasLaborales extends Model
{
    public $table = 'of_laborales'; // hace referencia a la tabla cliente de la bd
    public $primaryKey = 'id_of_laborales';
    public $fillable = [
        'imagen','nombre','url','nombres','created_at','updated_at'
    ];
    public $timestamps = true;
    //use HasFactory;
}
