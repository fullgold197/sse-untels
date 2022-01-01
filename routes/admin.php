<?php

use App\Http\Controllers\CambiarContrasenaController;
use App\Http\Controllers\DatosPersonalesController;
use App\Http\Controllers\EgresadosAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/admin', function () {
        return view('admin.home');
    });
    /* Route::get('/admin', function () {
        return view('admin.egresado.graficos');
    }); */
});
Route::resource('/admin/usuario', UsuarioController::class)->middleware('auth');

