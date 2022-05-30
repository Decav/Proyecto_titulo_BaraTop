<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Rutas de Controllers
use App\Http\Controllers\NegociosController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\EtiquetasController;



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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Negocios
Route::post("negocios/post",[NegociosController::class, "crearNegocios"]);
Route::get("negocios/get",[NegociosController::class, "getNegocio"]);

Route::post("reportes/post",[ReportesController::class, "crearReportes"])->name('reportes.post');
Route::get("reportes/get",[ReportesController::class, "getReporte"])->name('reportes.get');
Route::get("reportes/get/{rut}", [ReportesController::class, "getReporteRut"])->name('reportes.get.rut');
Route::post("reportes/delete",[ReportesController::class, "eliminarReporte"])->name('reportes.delete');


Route::post("etiquetas/post",[EtiquetasController::class, "crearEtiquetas"])->name('etiquetas.post');
Route::get("etiquetas/get",[EtiquetasController::class, "getEtiqueta"])->name('etiquetas.get');
Route::post("etiquetas/delete",[EtiquetasController::class, "eliminarEtiqueta"])->name('etiquetas.delete');