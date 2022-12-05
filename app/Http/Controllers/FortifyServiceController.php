<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctorado;
use App\Models\Maestria;
use Illuminate\Support\Facades\Hash;
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

class FortifyServiceController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if( Auth::attempt($credentials) ){
            $user = Auth::user();
            $token = md5( time() ).'.'.md5($request->egresado_matricula);
            $user->forceFill([
                'api_token'=>$token,
            ])->save();

            if ( $user->role_as == '0' ){
                return response()->json([
                    'message'=>'Usted es un egresado, no moleste por favor.'
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

}
