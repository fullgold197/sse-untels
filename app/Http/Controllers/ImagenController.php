<?php

namespace App\Http\Controllers;

use App\Models\Egresado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    public function update(Request $request, $matricula)
    {
        if ($request->hasFile('file')) {
            $egresados = Egresado::findOrFail($matricula);
            $file = $request->file('file');
            $destinationPath = 'images';
            $filename = time() .  '-' . $file->getClientOriginalName();
            $uploadSuccess  = $request->file('file')->move($destinationPath, $filename);
            $egresados->url = $uploadSuccess;
            $egresados->save();
            try {
                if (Auth::user()->url <> NULL) {
                    $image_path = public_path(). '/' .Auth::user()->url;
                    unlink($image_path);
                }
            } catch (\Throwable $th) {

            }

        }


        /* $egresados = Egresado::findOrFail($matricula);
        $request->validate(
            [
                'file' => 'image|max:2048|mimes:jpg,png,jpeg'
            ]
        );

        $imagenes = '';
        if ($request->hasFile('file')) {
            $imagenes = $request->file('file')->getClientOriginalName();
            $ruta = $request->file('file')->storeAs('public/imagenes/subfolder/ '. $egresados->matricula, $imagenes);
            $url = Storage::url($ruta);
            if ($egresados->url != '') {
            };

            $egresados->update(['url' => $url]);
        }


        $egresados->save(); */

        if ($request->hasFile('file')) {
        $url_users = $uploadSuccess; //la variable $url_users igual la direccion $url
        $egresado_matricula = $matricula; //iguala el campo egresado_matricula con la llave primaria $matricula de la tabla egresado
        //Permite actualizar otra tabla
        DB::table('users')
        ->where('egresado_matricula', $egresado_matricula) //encuentra el campo solicitado que sería egresado matricula de la tabla users
        ->limit(1) //opcional: para garantizar que solo se actualice un registro.
        ->update(array('url' => $url_users)); //la url representa el campo a actualizar
        }
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
