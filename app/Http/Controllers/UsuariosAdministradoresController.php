<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminAdministradorEditRequest;
use App\Http\Requests\AdminAdministradorCreateRequest;
use App\Http\Requests\AdminEgresadoCreateRequest;
use App\Http\Requests\AdminEgresadoEditRequest;
use Illuminate\Validation\Rule;

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
            $texto = $request->get('texto');

        } else {
            $string = '$request->texto';
        }
        $texto = $request->get('texto');
        //trae de la tabla $egresados todo los campos. Debid
        $usuarios = DB::table('users')
        ->select('id', 'name', 'email', 'role_as', 'password','estado')
        ->where('role_as', 1)
       /*  ->where('name', 'LIKE', '%' . $texto . '%')
        ->where('email', 'LIKE', '%' . $texto . '%')
        ->where('role_as', 'LIKE', '%' . $texto . '%') */

        ->orderBy('name', 'asc')
        ->paginate(5);
        /* if(){

        }
        else if(){

        } */
         /* return $usuarios; */
        return view('admin.usuarios.administradores.administradores_index', compact('usuarios','texto'), ['valor' => $string]);
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
        request()->validate([
            'name' => ['required','string'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => 'required|min:6',
            'estado' => 'required'
        ],
            [
                'name.required' => 'El campo usuario es obligatorio.',
            ]);
        $usuarios = new User();
        $usuarios->name = $request->input('name');
        $usuarios->email = $request->input('email');
        $usuarios->password = Hash::make($request->input('password'));
        /* $usuarios->egresado_matricula = $request->input('egresado_matricula'); */
        $usuarios->role_as = 1;
        $usuarios->estado = $request->input('estado');
        $usuarios->save();
        return back()->withInput();

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
        $role_as = "1";
        request()->validate([
            'name' => ['required','string'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore(User::findOrFail($id)),
                    ],
        ],
            [
                'name.required' => 'El campo usuario es obligatorio.',
            ]);
        $usuario = User::findOrFail($id);
        if (trim($request->password) == '') {
            $usuario->name = $request->input('name');
            $usuario->email = $request->input('email');
            $usuario->role_as = $role_as;
            $usuario->estado = $request->input('estado');
            $usuario->save();
        } else {
            $usuario->name = $request->input('name');
            $usuario->email = $request->input('email');
            $usuario->role_as = $role_as;
            $usuario->estado = $request->input('estado');
            $usuario->password = Hash::make($request->input('password'));
            $usuario->save();
        }
        /* $path = $_SERVER['HTTP_REFERER'];
        return redirect($path); */
        /* return redirect()->route('administradores.index'); */
        /* return back()->withInput(); */
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
        return back()->withInput();
       /*  return redirect()->route('administradores.index'); */
        /* $path = $_SERVER['HTTP_REFERER'];
        return redirect($path);
 */
    }
}
