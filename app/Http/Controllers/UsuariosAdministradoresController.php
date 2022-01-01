<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosAdministradoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->texto == "") {
            $string = "empty";
        } else {
            $string = $request->texto;
        }
        $texto = $request->get('texto');
        //trae de la tabla $egresados todo los campos
        $usuarios = DB::table('users')
        ->select('id', 'name', 'email', 'role_as', 'password',)

        /* ->orWhere('name', 'LIKE', '%' . $texto . '%')
        ->orWhere('email', 'LIKE', '%' . $texto . '%')
        ->orWhere('role_as', 'LIKE', '%' . $texto . '%') */
        ->where('role_as', 1)
        ->orderBy('name', 'asc')
        ->paginate(5);
         /* return $usuarios; */
        return view('admin.usuarios.administradores_index', compact('usuarios', 'texto'), ['valor' => $string]);
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
        $usuarios = new User();
        $usuarios->name = $request->input('name');
        $usuarios->email = $request->input('email');
        $usuarios->password = Hash::make($request->input('password'));
        $usuarios->egresado_matricula = $request->input('egresado_matricula');
        $usuarios->role_as = 1;
        /* $usuarios->role_as = $request->input('role_as'); */
        $usuarios->save();
        return redirect()->route('administradores.index');
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
        $usuario = User::findOrFail($id);
        if (trim($request->password) == '') {
            $usuario->name = $request->input('name');
            $usuario->email = $request->input('email');
            $usuario->role_as = $request->input('role_as');
            $usuario->save();
        } else {
            $usuario->name = $request->input('name');
            $usuario->email = $request->input('email');
            $usuario->role_as = $request->input('role_as');
            $usuario->password = Hash::make($request->input('password'));
            $usuario->save();
        }

        return redirect()->route('administradores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuarios = User::findOrFail($id);
        $usuarios->delete();
        return redirect()->route('administradores.index');
    }
}
