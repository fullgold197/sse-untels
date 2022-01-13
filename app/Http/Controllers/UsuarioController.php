<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Egresado;
use App\Http\Requests\EgresadoEditRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminEgresadoEditRequest;
use App\Http\Requests\AdminEgresadoCreateRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
class UsuarioController extends Controller
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
            $string = '$request->texto';
        }
        $texto = $request->get('texto');
        //Trae de la tabla $egresados todo los campos. Aqui se está filtrando y solo muestra los usuarios que contengan un codigo de egresado y su matricula,
        $usuarios = DB::table('users')
        ->join('egresado','users.egresado_matricula','=','egresado.matricula')
        ->select('users.id', 'users.name', 'users.email', 'users.role_as','users.password', 'users.estado','egresado.ap_paterno','egresado.ap_materno','egresado.nombres', 'egresado.matricula', 'egresado.matricula')
        ->where('name', 'LIKE', '%' . $texto . '%')
        ->orWhere('email', 'LIKE', '%' . $texto . '%')
        ->orWhere('role_as', 'LIKE', '%' . $texto . '%')
        ->orWhere('ap_paterno', 'LIKE', '%' . $texto . '%')
        ->orWhere('ap_materno', 'LIKE', '%' . $texto . '%')
        ->orWhere('nombres', 'LIKE', '%' . $texto . '%')
        ->orWhere('matricula', 'LIKE', '%' . $texto . '%')
        ->orderBy('name', 'asc')
        ->paginate(5);
       /*  return $usuarios; */
        return view('admin.usuarios.egresados.index', compact('usuarios', 'texto'), ['valor' => $string]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminEgresadoCreateRequest $request)
    {
        $regresar = $request->get('regresar');
        $matricula_egresado= $request->get('egresado_matricula');
        $usuarios = new User;
        $usuarios->name = $request->input('name');
        $usuarios->email = $request->input('email');
        $usuarios->password = Hash::make($request->input('dni'));
        $usuarios->egresado_matricula = $request->input('egresado_matricula');
        $usuarios->dni = $request->input('dni');
        $usuarios->estado = 0;
        $usuarios->save();

        DB::table('egresado')
        ->where('matricula', $matricula_egresado)
        ->limit(1)
        ->update(array('habilitado' => 1));

        /* return $usuarios; */
        if($regresar=='1'){
            return back()->withInput();
            /* return redirect()->route('egresado.index'); */
            /* $path = $_SERVER['HTTP_REFERER'];
            return redirect($path); */


        }
        else{
            return back()->withInput();
            /* return redirect()->route('usuario.index'); */
            /* $path = $_SERVER['HTTP_REFERER'];
            return redirect($path); */
        }

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
        $usuarios = User::findOrFail($id);

        //return $egresados;
        return view('admin.usuarios.editar', compact('usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminEgresadoEditRequest $request,$id)
    {
        $role_as = $request->input('role_as');
        $usuario = User::findOrFail($id);

        if(trim($request->password) == ''){
            $usuario->name = $request->input('name');
            $usuario->email = $request->input('email');
            $usuario->role_as = $request->input('role_as');
            $usuario->estado = $request->input('estado');
            $usuario->save();
        }
        else{
            $usuario->name = $request->input('name');
            $usuario->email = $request->input('email');
            $usuario->role_as = $request->input('role_as');
            $usuario->estado = $request->input('estado');
            $usuario->password = Hash::make($request->input('password'));
            $usuario->save();
        }

        if ($role_as == '0') {

            /*  $path = $_SERVER['HTTP_REFERER'];
            return redirect($path); */
            return back()->withInput();
            /* return redirect()->route('usuario.index'); */
        } else if ($role_as == '1') {
            /*  $path = $_SERVER['HTTP_REFERER'];
            return redirect($path); */
            return back()->withInput();
            /* return redirect()->route('administradores.index'); */
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $egresado_matricula =$request->get('egresado_matricula');
        DB::table('egresado')
        ->where('matricula', $egresado_matricula)  // find your user by their email
        ->limit(1)  // optional - to ensure only one record is updated.
        ->update(array('habilitado' =>'0'));  // update the record in the DB.

        $usuarios = User::findOrFail($id);
        $usuarios->delete();
        return back()->withInput();
      /*   return redirect()->route('usuario.index'); */
       /*  $path = $_SERVER['HTTP_REFERER'];
        return redirect($path); */


    }

}
