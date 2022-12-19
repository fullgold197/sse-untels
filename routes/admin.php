<?php

use App\Http\Controllers\CambiarContrasenaController;
use App\Http\Controllers\DatosPersonalesController;
use App\Http\Controllers\EgresadoAcademicoProfesionalController;
use App\Http\Controllers\EgresadosAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfertasLaboralesController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UsuariosAdministradoresController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

//En este grupo de funciones se hacen dos operaciones. Primero va hacia el middleware 'auth' para saber si el usuario está logueado, despues de esto va hacia el middleware 'isAdmin'. Aqui verifica si tiene el rol de admin.
Route::middleware(['auth', 'isAdmin'])->group(function () {

/*     Route::get('/admin', function () {
        return view('admin.inicio.home');
    });
 */

    //Ruta para las gráficas de maestrias
    Route::get('/admin/egresado/GraficoVistaEgresados',
    [App\Http\Controllers\GraficosEgresadosAdminController::class, 'index'])->name('egresados.graficos');

    //Ruta para las gráficas de doctorados
    Route::get('/admin/egresado/GraficoVistaEgresadosDoctorados', [App\Http\Controllers\PorcentajeDoctoradoController::class, 'index'])->name('egresadosdoctorados.graficos');

    //Ruta para la vista de importar el excel
    Route::get('/admin/egresado/VistaImportexcel', [App\Http\Controllers\ReporteAdminController::class, 'VistaImportexcel'])->name('egresados.Import-excel');

    //Ruta para importar el excel con la lista de los egresados
    Route::post('admin/egresado/ImportExcel', [App\Http\Controllers\ReporteAdminController::class, 'importExcel'])->name('admin/egresado/ImportExcel');

    //Ruta para exportar el excel con la lista de los egresados
    Route::get('/admin/egresado/Exportexcel', [App\Http\Controllers\ReporteAdminController::class, 'exportExcel'])->name('egresados.Export-excel');

    //Ruta para exportar el pdf con la lista de los egresados
    Route::get('/admin/egresado/pdf/{string}', [App\Http\Controllers\ReporteAdminController::class, 'showReporteEgresados'])->name('imprimir');

    //Ruta ver la lista parcial de los egresados
    Route::resource('/admin/egresado', EgresadosAdminController::class);

    //Ruta ver la lista completa de los egresados
    Route::resource('/admin/academico-profesional',EgresadoAcademicoProfesionalController::class);

    //Ruta para ver ofertas laborales
    Route::resource('/admin/ofertas-laborales',OfertasLaboralesController::class);
/*
    //Ruta para la vista de usuarios de egresados
    Route::resource('/admin/usuario', UsuarioController::class);

    //Ruta para la vista de usuarios de administradores
    Route::resource('/admin/administradores', UsuariosAdministradoresController::class); */
});

//Rutas de superadmin y admin
Route::middleware(['auth', 'isSuperAdmin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.inicio.home');
        /* $role = Auth::user()->role_as; */
    });
    //Ruta para la vista de usuarios de egresados
    Route::resource('/admin/usuario', UsuarioController::class);

    //Ruta para la vista de usuarios de administradores
    Route::resource('/admin/administradores', UsuariosAdministradoresController::class);
});


