<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImagenController extends Controller
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
        $egresados = User::findOrFail($id);
        $request->validate(
            [
                'file' => 'image|max:2048'
            ]
        );
        /* return $request->all();*/
        /* return $request->file('file')->store('public/imagenes'); //ahora devuelve una url public/imagenes/da$%1¿.png , pero queremos cambiar el nombre public por storage(storage/imagenes/da$%1¿.png) con el Facade Storage */

        $imagenes = '';
        if ($request->hasFile('file')) {
            $imagenes = $request->file('file')->getClientOriginalName();
            $ruta = $request->file('file')->storeAs('public/imagenes/subfolder/ ' . Auth::user()->egresado_matricula, $imagenes);
            $url = Storage::url($ruta);
            if ($egresados->url != '') {  //si ya hay imagenes anteriores entonces eliminarlas y que solo quede la ultima imagen actualizada
                //unlink(storage_path('app/public/imagenes/subfolder/ '. $egresados->matricula.'/image (1).png'));



            };
            //para obtener la ruta de la imagen correspondiente a app/storage/public/imagenes/subfolder.... hayamos definido en la variable $ruta
            $egresados->update(['url' => $url]);
        }
        //ahora si podemos almacenar esta url en nuestra BD
        /*    $img=new Egresado();
            $img->url=$url;
            $img->save(); */
        /*   $egresados=Egresado::create(
                [
                    'url' =>$url
                ]
                ); */
       

        $egresados->save();

        /* return $url; */
        return redirect()->route('datos-personales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
