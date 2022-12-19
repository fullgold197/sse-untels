<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QQR2Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\MaestriaController;
use App\Http\Controllers\OfertasLaboralesEgresadoController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\DoctoradoController;
use App\Http\Controllers\TrayectoriaAcademica;
use App\Http\Controllers\TrayectoriaProfesional;
use App\Http\Controllers\EgresadosAdminController;
use App\Http\Controllers\DatosPersonalesController;
use App\Http\Controllers\CambiarContrasenaController;
use App\Http\Controllers\Cambiarcontrasenapordefecto;
use App\Http\Controllers\TrayectoriaAcademicaController;
use App\Http\Controllers\TrayectoriaProfesionalController;
use App\Http\Controllers\UsuariosAdministradoresController;
use App\Http\Controllers\EgresadoAcademicoProfesionalController;
use App\Http\Controllers\EgresadosAdminTrayectoriaAcademicaController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 //esta ruta es para el inicio si encaso se quisiera agragar más cosas al sistema
Route::get('/', function () {
    return view('auth.login');
});

//En este grupo de funciones se hacen dos operaciones. Primero va hacia el middleware 'auth' para saber si el usuario está logueado, despues de esto va hacia el middleware 'isUser'. Aqui verifica si tiene el rol de user.


Route::middleware(['auth','isUser','isCambiarcontrasena'])->group(function () {

    //Ruta para la vista de datos personales del egresado
    Route::resource('/home/datos-personales', DatosPersonalesController::class);

    //Ruta para la vista de trayectoria academica del egresado
    Route::resource('/home/trayectoria-academica', TrayectoriaAcademicaController::class);

    //Ruta para cambiar foto del egresado
    Route::resource('/home/datos-personales/imagen', ImagenController::class);

    //Ruta para la vista de trayectoria académica de su maastría del egresado
    Route::resource('/home/trayectoria-academica/maestria', MaestriaController::class);

    //Ruta para la vista de trayectoria académica de su docotorado del egresado
    Route::resource('/home/trayectoria-academica/doctorado', DoctoradoController::class);

    //Ruta para la vista de trayectoria profesional del egresado
    Route::resource('/home/trayectoria-profesional', TrayectoriaProfesionalController::class);


    //Ruta para listar de 5 en 5 cualquier lista
    Route::resource('/permisos', App\Http\Controllers\PermissionController::class);

    //Ruta para la vista de cambiar contraseña del egresado
    Route::view('/home/password', 'users.password')->name('password');
 //Ruta para la vista de cambiar contraseña del egresado por defecto
    });

Route::resource('/cambiarcontrasenapordefecto', Cambiarcontrasenapordefecto::class);
/* Route::view('/cambiarcontrasenapordefecto', 'users.cambiar_contrasena_defecto')->name('passwordDefecto'); */
    //Oferta laborales
 /*    Route::resource('/home/ofertas-laborales-egresado', OfertasLaboralesEgresadoController::class); */

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/* Route::get('logout', 'AppHttpControllersAuthLoginController@logout'); */
/* Route::get('/alumnos', [App\Http\Controllers\AlumnoController::class, 'index']);
Route::get('/alumnos/crear', [AlumnoController::class, 'create']);
Route::post('/alumnos/crear',  [AlumnoController::class, 'store']); */
/* Route::get('logout', 'AppHttpControllersAuthLoginController@logout'); */
















