<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\estudtiantesController as estudiantes_v1;

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

Route::get('/', function () {
    return view('welcome');
});


/*---------------------------------------+
|                                        |
|        Rutas usuario logueado          |
+----------------------------------------*/
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    /*---------------------------------------+
    |                                        |
    |        Rutas MAIE                      |
    +----------------------------------------*/
    Route::prefix('maie')->group(function () {
        Route::view('/seguimiento', 'admin.estudiante.index');
        Route::post('/subir/documento', [estudiantes_v1::class,'imporEstudiantes']);
        Route::get('/elimina/datos/{id}', [estudiantes_v1::class,'EliminarDatos']);
    });
    /*---------------------------------------+
    |                                        |
    |        Rutas API                     |
    +----------------------------------------*/
    Route::prefix('api')->group(function () {
        Route::get('/lista/estudiantes/{id}', [estudiantes_v1::class,'getEstudiantes']);
    });
});

Auth::routes();



