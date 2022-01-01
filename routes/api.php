<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [App\Http\Controllers\Authcontroller::class, 'login']);


Route::middleware(['auth:api'])->group(function(){
    //Datos personales
    Route::get('/datospersonales', [App\Http\Controllers\Authcontroller::class, 'datospersonales']);
    Route::put('/updatedp/{matricula}', [App\Http\Controllers\Authcontroller::class, 'updatedp']);

    //Trayectoria academica
    Route::get('/trayectoriaaca', [App\Http\Controllers\Authcontroller::class, 'trayectoriaaca']);
    Route::post('/createtrayaca', [App\Http\Controllers\Authcontroller::class, 'createtrayaca']);
    Route::put('/updatemaes/{id_maestria}', [App\Http\Controllers\Authcontroller::class, 'updatemaes']);
    Route::delete('/deletemaes/{id_maestria}', [App\Http\Controllers\Authcontroller::class, 'deletemaes']);
    Route::put('/updatedoc/{id_maestria}', [App\Http\Controllers\Authcontroller::class, 'updatedoc']);
    Route::delete('/deletedoc/{id_maestria}', [App\Http\Controllers\Authcontroller::class, 'deletedoc']);
   
    //Trayectoria profesional
    Route::get('/trayectoriapro', [App\Http\Controllers\Authcontroller::class, 'trayectoriapro']);
    Route::post('/createtraypro', [App\Http\Controllers\Authcontroller::class, 'createtraypro']);
    Route::put('/updatetraypro/{id_profesion}', [App\Http\Controllers\Authcontroller::class, 'updatetraypro']);
    Route::delete('/deletetraypro/{id_profesion}', [App\Http\Controllers\Authcontroller::class, 'deletetraypro']);

    
    
    Route::post('/logout', [App\Http\Controllers\Authcontroller::class, 'logout']);
});
