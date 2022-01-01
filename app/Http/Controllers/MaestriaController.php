<?php

namespace App\Http\Controllers;

use App\Models\Doctorado;
use App\Models\Maestria;
use Illuminate\Http\Request;

class MaestriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     public function store(Request $request)
    {



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_maestria)
    {
        /* $egresados = Maestria::findOrFail($id_maestria); */

        /* return $egresados; */
        /* return view('users.modalEgresados.academico_edit', compact('egresados')); */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_maestria)
    {
        $egresados = Maestria::findOrFail($id_maestria);
        $egresados->pais = $request->input('maestria_pais');
        $egresados->institución = $request->input('maestria_institución');
        $egresados->fecha_inicial = $request->input('maestria_fecha_inicial');
        $egresados->fecha_final = $request->input('maestria_fecha_final');
        $egresados->save();
        //return $egresados; 
        return redirect()->route('trayectoria-academica.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_maestria)
    {
        $egresados = Maestria::findOrFail($id_maestria);
        $egresados->delete();
        return redirect()->route('trayectoria-academica.index');
    }
}
