<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctorado;
use App\Models\Maestria;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Egresado;
use App\Models\Profesion;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DatosPersonalesController;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;

class Authcontroller extends Controller
{
    public function datospersonales(Request $data){
        $egresados = DB::table('egresado')
        ->join('users', 'egresado.matricula', '=', 'users.egresado_matricula')
        ->select('egresado.matricula', 'egresado.ap_paterno', 'egresado.ap_materno', 'egresado.nombres', 'egresado.genero', 'egresado.fecha_nacimiento', 'egresado.celular', 'egresado.dni', 'users.url', 'users.id')->where('matricula', Auth::user()->egresado_matricula)->get();        
    
        return compact('egresados');
    }

    public function updatedp(Request $request, $matricula)
    {
        $egresados = Egresado::findOrFail($matricula);

        $egresados->ap_paterno = $request->input('ap_paterno');
        $egresados->ap_materno = $request->input('ap_materno');
        $egresados->nombres = $request->input('nombres');
        $egresados->genero = $request->input('genero');
        $egresados->celular = $request->input('celular');
        $egresados->fecha_nacimiento = $request->input('fecha_nacimiento');
        //$egresados->url=$url;
        
        $egresados->save();
        //return $url;
        return $egresados;
    }


    public function trayectoriaaca(Request $request)
    {
        $egresados0= DB::table('egresado')
        ->join('academico', 'egresado.id_academico', '=', 'academico.id_academico')
        ->select('academico.carr_profesional','egresado.grado_academico', 'egresado.semestre_ingreso', 'egresado.semestre_egreso')
        ->where('matricula', Auth::user()->egresado_matricula)
        ->get();

        $egresados1 = DB::table('egresado')
            ->join('doctorado', 'egresado.matricula', '=', 'doctorado.matricula')
            ->join('academico', 'egresado.id_academico', '=', 'academico.id_academico')
            ->select('egresado.matricula', 'academico.id_academico','academico.carr_profesional','doctorado.id_doctorado', 'doctorado.grado_academico as doctorado_grado_academico', 'doctorado.pais as doctorado_pais', 'doctorado.institución as doctorado_institución', 'doctorado.fecha_inicial as doctorado_fecha_inicial', 'doctorado.fecha_final as doctorado_fecha_final')
            ->where('egresado.matricula', Auth::user()->egresado_matricula)
            ->get();

        $egresados= DB::table('maestria')
            ->join('egresado', 'egresado.matricula', '=', 'maestria.matricula')
            ->join('academico', 'egresado.id_academico', '=', 'academico.id_academico')
            ->select('egresado.matricula', 'academico.id_academico', 'academico.carr_profesional', 'maestria.id_maestria', 'maestria.grado_academico as maestria_grado_academico', 'maestria.pais as maestria_pais', 'maestria.institución as maestria_institución', 'maestria.fecha_inicial as maestria_fecha_inicial', 'maestria.fecha_final as maestria_fecha_final')
            ->where('egresado.matricula', Auth::user()->egresado_matricula)
            ->get();
        /* return $egresados; */
        return compact('egresados0','egresados','egresados1');
    }

    public function createtrayaca(Request $request)
    {
        $prueba = $request->input('grado_academico');

        if ($prueba == 'Maestro') {
            $egresados = new Maestria();
            $egresados->grado_academico = $request->input('grado_academico');
            $egresados->pais = $request->input('pais');
            $egresados->institución = $request->input('institución');
            $egresados->fecha_inicial = $request->input('fecha_inicial');
            $egresados->fecha_final = $request->input('fecha_final');
            $egresados->matricula = Auth::user()->egresado_matricula;
            $egresados->save();
            return $egresados;
            //return redirect()->route('trayectoria-academica.index');
        } else {
            if ($prueba == 'Doctor') {
                $egresados = new Doctorado();
                $egresados->grado_academico = $request->input('grado_academico');
                $egresados->pais = $request->input('pais');
                $egresados->institución = $request->input('institución');
                $egresados->fecha_inicial = $request->input('fecha_inicial');
                $egresados->fecha_final = $request->input('fecha_final');
                $egresados->matricula = Auth::user()->egresado_matricula;
                $egresados->save();
                /* return $egresados; */
                return redirect()->route('trayectoria-academica.index');
            }
        }
    }

    public function updatemaes(Request $request, $id_maestria)
    {
        $egresados = Maestria::findOrFail($id_maestria);
        $egresados->pais = $request->input('maestria_pais');
        $egresados->institución = $request->input('maestria_institución');
        $egresados->fecha_inicial = $request->input('maestria_fecha_inicial');
        $egresados->fecha_final = $request->input('maestria_fecha_final');
        $egresados->save();
        /* return $egresados; */
        return $egresados;
    }

    public function deletemaes($id_maestria)
    {
        $egresados = Maestria::findOrFail($id_maestria);
        $egresados->delete();
        return $egresados;
    }

    public function trayectoriapro(Request $request)
    {
        /* $egresados = Profesion::all(); */
        /* return $users; */
        $egresados = DB::table('profesion')
            ->select('id_profesion','empresa', 'actividad_empresa', 'actividad_empresa', 'puesto', 'nivel_experiencia', 'area_puesto', 'subarea', 'pais', 'fecha_inicio', 'fecha_finalizacion', 'descripcion_responsabilidades')
            ->where('matricula', Auth::user()->egresado_matricula)
            ->get();
        /* $egresados = DB::table('profesion')
            ->join('egresado', 'profesion.matricula', '=', 'egresado.matricula')
            ->select('profesion.id_profesion', 'profesion.empresa', 'profesion.actividad_empresa',  'profesion.puesto', 'profesion.nivel_experiencia', 'profesion.area_puesto', 'profesion.subarea', 'profesion.pais', 'profesion.fecha_inicio', 'profesion.fecha_finalizacion', 'profesion.descripcion_responsabilidades')
            ->where('profesion.matricula', Auth::user()->egresado_matricula)
            ->get(); */
        /* return $egresados; */

        return compact('egresados');
    }

    public function updatedoc(Request $request, $id_doctorado)
    {
        $egresados = Doctorado::findOrFail($id_doctorado);
        $egresados->pais = $request->input('doctorado_pais');
        $egresados->institución = $request->input('doctorado_institución');
        $egresados->fecha_inicial = $request->input('doctorado_fecha_inicial');
        $egresados->fecha_final = $request->input('doctorado_fecha_final');
        $egresados->save();
        /* return $egresados; */
        return $egresados;
    }

    public function deletedoc($id_doctorado)
    {
        $egresados = Doctorado::findOrFail($id_doctorado);
        $egresados->delete();
        return $egresados;
    }

    public function createtraypro(Request $request)
    {
        $egresados = new Profesion();
        $egresados->empresa = $request->input('empresa');
        $egresados->actividad_empresa = $request->input('actividad_empresa');
        $egresados->puesto = $request->input('puesto');
        $egresados->nivel_experiencia = $request->input('nivel_experiencia');
        $egresados->area_puesto = $request->input('area_puesto');
        $egresados->subarea = $request->input('subarea');
        $egresados->pais = $request->input('pais');
        $egresados->fecha_inicio = $request->input('fecha_inicio');
        $egresados->fecha_finalizacion = $request->input('fecha_finalizacion');
        $egresados->descripcion_responsabilidades = $request->input('descripcion_responsabilidades');
        $egresados->matricula = Auth::user()->egresado_matricula;
        $egresados->save();
        //return redirect()->route('trayectoria-profesional.index');
        return $egresados;
    }
    

    public function updatetraypro(Request $request, $id_profesion)
    {
        $egresados = Profesion::findOrFail($id_profesion);
        $egresados->empresa = $request->input('empresa');
        $egresados->actividad_empresa = $request->input('actividad_empresa');
        $egresados->puesto = $request->input('puesto');
        $egresados->nivel_experiencia = $request->input('nivel_experiencia');
        $egresados->area_puesto = $request->input('area_puesto');
        $egresados->subarea = $request->input('subarea');
        $egresados->pais = $request->input('pais');
        $egresados->fecha_inicio = $request->input('fecha_inicio');
        $egresados->fecha_finalizacion = $request->input('fecha_finalizacion');
        $egresados->descripcion_responsabilidades = $request->input('descripcion_responsabilidades');
        $egresados->save();
        return $egresados;
    }

    public function deletetraypro($id_profesion)
    {
        $egresados = Profesion::findOrFail($id_profesion);
        $egresados->delete();
        return $egresados;
    }

    public function register(Request $data){

        $data->validate([
            'name' => ['required', 'string', 'max:255'],
            'egresado_matricula' => ['required', 'string', 'max:255', Rule::unique(User::class)],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $result = User::create([
            'name' => $data->name,
            'egresado_matricula' => $data['egresado_matricula'],
            'email' => $data['email'],
            'password' => Hash::make($data->password),
        ]);

        return $result;
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'dni'=>'required',
            'password'=>'required'
        ]);

        if( Auth::attempt($credentials) ){
            $user = Auth::user();
            $token = md5( time() ).'.'.md5($request->egresado_matricula);
            $user->forceFill([
                'api_token'=>$token,
            ])->save();

            if ( $user->estado == '0' ){
                return response()->json([
                    'message'=>'Su cuenta está bloqueada. Por favor, comuníquese con su escuela para más detalles.'
                ]);
            }
            else{
                return response()->json([
                    'token'=>$token
                ]);
            }
        }

        return response()->json([
            'message'=>'Los datos ingresados son incorrectos.'
        ],401);
    }


    public function logout(Request $request){
        $request->user()->forceFill([
            'api_token'=>null,
        ])->save();

        return response()->json(['message'=>'success']);
    }

    public function cambiarContrasenaDefecto(Request $request)
    {
        //
        $value = $request->get('contrasenaactual');
        $rules = [
            'contrasenaactual'=>['required',
            function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('El campo contraseña actual es incorrecto.');
                }
            },
        ],
            'password' => 'required|min:8',
            'repitanuevacontrasena' => 'required|min:8|same:password',
        ];

        $messages = [
            'repitanuevacontrasena.same' => 'La confirmación de la contraseña debe coincidir con la nueva contraseña',
            'repitanuevacontrasena.required' => 'El campo confirmar nueva contraseña es obligatorio.',
            'repitanuevacontrasena.min' => 'El campo repita nueva contraseña debe contener al menos 8 caracteres.',
            'password.required' => 'El campo nueva contraseña es obligatorio.',
            'password.min' => 'El campo nueva contraseña debe contener al menos 8 caracteres.',
            'contrasenaactual.required'=>'El campo contraseña actual es obligatorio.'

        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator-> messages());
        }
        else{

            if(Hash::check($request->contrasenaactual,Auth::user()->password)){
                $user= new User;
                $user->where('email','=',Auth::user()->email)
                ->update(['password'=>bcrypt($request->password),
                           'estadocontrasena'=>'modificado'
            ]);
/*             return redirect('/login')->with('status','Contraseña cambiada con exito'); */
            //Auth::logout(); //cierra sesion primero (esto hace uso de la ruta logout en web.php)
            return redirect('/home')->with('status','Contraseña cambiada con exito');
            //return "Hola";
            }
        }

    }

    public function updateEgresado(Request $request,$matricula)
    {
        $user = Auth::user();
        $dni = $request->get('dni');
        request()->validate([
            'matricula' => ['required',
                            'numeric',
                            'digits:10',
                            Rule::unique(Egresado::class)->ignore(Egresado::findOrFail($matricula))
                        ],
            'ap_paterno' => ['required','string'],
            'ap_materno' => ['required','string'],
            'nombres' => ['required','string'],
            'grado_academico' => ['required','string'],
            'dni' => ['required',
                    'numeric',
                    'digits:8',
                    Rule::unique(Egresado::class)->ignore(Egresado::findOrFail($matricula))
                    ],
            'genero' => ['required'],
            'fecha_nacimiento' => ['required'],
            'año_ingreso' => ['required','numeric','digits:4'],
            'semestre_ingreso' => ['required','numeric','digits:1'],
            'año_egreso' => ['required','numeric','digits:4'],
            'semestre_egreso' => ['required','numeric','digits:1'],
            'celular' => ['required','numeric','digits:9'],
            'pais_origen' => 'required|string',
            'departamento_origen' => 'required|string',
            'pais_residencia' => 'required|string',
            'ciudad_residencia' => 'required|string',
            'lugar_residencia' => 'required|string',
            'linkedin' => ['required','string'],
            'id_academico' => ['required'],
        ],
            [

            ]);

        $egresados=Egresado::findOrFail($matricula);
        $egresados->matricula = $request->input('matricula');
        $egresados->ap_paterno = $request->input('ap_paterno');
        $egresados->ap_materno = $request->input('ap_materno');
        $egresados->nombres = $request->input('nombres');
        $egresados->dni = $request->input('dni');
        $egresados->genero = $request->input('genero');
        $egresados->fecha_nacimiento = $request->input('fecha_nacimiento');
        $egresados->año_ingreso = $request->input('año_ingreso');
        $egresados->semestre_ingreso = $request->input('semestre_ingreso');
        $egresados->año_egreso = $request->input('año_egreso');
        $egresados->semestre_egreso  = $request->input('semestre_egreso');
        $egresados->celular = $request->input('celular');
        $egresados->pais_origen = $request->input('pais_origen');
        $egresados->departamento_origen = $request->input('departamento_origen');
        $egresados->pais_residencia  = $request->input('pais_residencia');
        $egresados->ciudad_residencia = $request->input('ciudad_residencia');
        $egresados->lugar_residencia = $request->input('lugar_residencia');
        $egresados->linkedin = $request->input('linkedin');
        $egresados->id_academico=$request->input('id_academico');

        $egresados->save();

        return "Los cambios se han realizado satisfactoriamente.";
    }

}

class FortifyServiceProviderController extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /* $this->app->instance(LoginResponse::class, new class implements LoginResponse
        {
            public function toResponse($request)
            {
                if(1>2){
                    return redirect('/cambiarcontrasena');
                }
                else{
                    return redirect('/home');
                }

            }
        }); */


    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::loginView(function () {
            return view('auth.login');
        });

        /* Fortify::registerView(function () {

            return view('auth.register');
        }); */

        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.passwords.email');
        });

        Fortify::resetPasswordView(function ($request) {
            return view('auth.passwords.reset', ['request' => $request]);
        });

        Fortify::verifyEmailView(function () {
            return view('auth.verify');
        });

        Fortify::authenticateUsing(function (Request $request) {
            /* $rol=User::where('role_as', $request->role_as)->first(); */

                $user = User::where('dni', $request->egresado_matricula)
                ->orWhere('email', $request->egresado_matricula)
                ->first();
                if (
                    $user &&
                    Hash::check($request->password, $user->password)
                )
                 {
                    return $user;
                }
        });

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}