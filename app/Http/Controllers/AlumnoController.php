<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    //
    public function index(){

        $alumnos=DB::table('alumnos')
        ->select('nombre', 'apellido', 'edad', 'direccion')
        ->paginate(5);
        return view('alumnos.index',compact('alumnos'));
    }

    public function store(){

        return view('alumnos.index');
    }

}
