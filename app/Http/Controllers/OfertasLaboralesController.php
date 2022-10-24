<?php

namespace App\Http\Controllers;

use App\Models\OfertasLaborales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfertasLaboralesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $of_laborales=DB::table('of_laborales')
        ->select('id_of_laborales','imagen', 'nombre', 'url')
        ->paginate(5);
        return view('admin.ofertas_laborales.index',compact('of_laborales'));
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
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_of_laborales)
    {
        $egresados = OfertasLaborales::findOrFail($id_of_laborales);
        $egresados->delete();
        return back()->withInput();
        return redirect()->route('egresado.index');
    }
}
