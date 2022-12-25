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
use Illuminate\Support\Facades\Auth;
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

        if (Auth::user()->role_as == 1) {
            $usuarios = DB::table('users')
            ->join('egresado','users.egresado_matricula','=','egresado.matricula')
            ->join('academico','users.id_academico','=','academico.id_academico')
            ->select('users.id', 'users.name', 'users.email', 'users.email_personal','users.role_as','users.password', 'users.estado','egresado.ap_paterno','egresado.ap_materno','egresado.nombres', 'egresado.matricula', 'egresado.matricula','academico.carr_profesional')
            /* ->where('name', 'LIKE', '%' . $texto . '%') */
            ->where('egresado.id_academico', Auth::user()->id_academico)
            ->where(function($query) use ($texto){
                $query
                    ->Where('users.name', 'LIKE', '%' . $texto . '%')
                    ->orWhere('users.email', 'LIKE', '%' . $texto . '%')
                    ->orWhere('users.egresado_matricula', 'LIKE', '%' . $texto . '%')
                    ->orWhere('users.email_personal', 'LIKE', '%' . $texto . '%')
                    ;
            })
            ->orderBy('name', 'asc')
            ->paginate(5);
        } elseif (Auth::user()->role_as == 2) {
            $usuarios = DB::table('users')
            ->join('egresado','users.egresado_matricula','=','egresado.matricula')
            ->join('academico','users.id_academico','=','academico.id_academico')
            ->select('users.id', 'users.name', 'users.email', 'users.email_personal','users.role_as','users.password', 'users.estado','egresado.ap_paterno','egresado.ap_materno','egresado.nombres', 'egresado.matricula', 'egresado.matricula','academico.carr_profesional')
            ->where(function($query) use ($texto){
                $query
                    ->Where('users.name', 'LIKE', '%' . $texto . '%')
                    ->orWhere('users.email', 'LIKE', '%' . $texto . '%')
                    ->orWhere('users.egresado_matricula', 'LIKE', '%' . $texto . '%')
                    ->orWhere('academico.carr_profesional', 'LIKE', '%' . $texto . '%')
                    ->orWhere('users.email_personal', 'LIKE', '%' . $texto . '%')
                    ;
            })
            ->orderBy('name', 'asc')
            ->paginate(5);
        }


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
        $usuarios->email_personal = $request->input('email_personal');
        $usuarios->password = Hash::make($request->input('dni'));
        $usuarios->egresado_matricula = $request->input('egresado_matricula');
        $usuarios->dni = $request->input('dni');
        $usuarios->estado = 1;
        $usuarios->id_academico = Auth::user()->id_academico;
        $usuarios->save();

        DB::table('egresado')
        ->where('matricula', $matricula_egresado)
        ->limit(1)
        ->update(array('habilitado' => 1));

        /* return $usuarios; */
        if($regresar=='1'){
            return back()->withInput();
        }
        else{
            return back()->withInput();
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
    public function update(Request $request,$id)
    {
        $role_as = "0";
        request()->validate([
            'name' => ['required','string'],
            'email' => [
                'nullable',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore(User::findOrFail($id)),
                    ],
            'email_personal' => [
                'nullable',
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

        if(trim($request->password) == ''){
            $usuario->name = $request->input('name');
            $usuario->email = $request->input('email');
            $usuario->email_personal = $request->input('email_personal');
            $usuario->role_as = $role_as;
            $usuario->estado = $request->input('estado');
            $usuario->save();
        }
        else{
            $usuario->name = $request->input('name');
            $usuario->email = $request->input('email');
            $usuario->email_personal = $request->input('email_personal');
            $usuario->role_as = $role_as;
            $usuario->estado = $request->input('estado');
            $usuario->password = Hash::make($request->input('password'));
            $usuario->save();
        }

        /* if ($role_as == '0') {
            return back()->withInput();

        } else if ($role_as == '1') {
            return back()->withInput();
        } */

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
