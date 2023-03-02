<?php

use App\Http\Controllers\Api\CervezaController;
use App\Http\Controllers\Api\CervezasColorController;
use App\Http\Controllers\Api\CervezasEnvaseTipoController;
use App\Http\Controllers\Api\CervezasEstiloController;
use App\Http\Controllers\Api\CervezasFamiliaController;
use App\Http\Controllers\Api\CervezasFermentoController;
use App\Http\Controllers\Api\ContinenteController;
use App\Http\Controllers\Api\DivisionesPoliticasTipoController;
use App\Http\Controllers\Api\LocalidadController;
use App\Http\Controllers\Api\LugarController;
use App\Http\Controllers\Api\PaisController;
use App\Http\Controllers\Api\ProductorController;
use App\Http\Controllers\Api\ProductoresFabricacionController;
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

//TODO CONVERTIR MANUALMENTE PARA QUE NO SE PUEDA EDITAR O ELIMINAR POR API

Route::apiResource('cervezas', CervezaController::class);
Route::apiResource('cervezas_colores', CervezasColorController::class);
Route::apiResource('cervezas_envases_tipos', CervezasEnvaseTipoController::class);
Route::apiResource('cervezas_estilos', CervezasEstiloController::class);
Route::apiResource('cervezas_familias', CervezasFamiliaController::class);
Route::apiResource('cervezas_fermentos', CervezasFermentoController::class);
Route::apiResource('continentes', ContinenteController::class);
Route::apiResource('divisiones_politicas_tipos', DivisionesPoliticasTipoController::class);
Route::apiResource('divisiones_politicas', DivisionesPoliticasTipoController::class);
Route::apiResource('lugares', LugarController::class);
Route::apiResource('localidades', LocalidadController::class);
Route::apiResource('paises', PaisController::class);
Route::apiResource('productores', ProductorController::class);
Route::apiResource('productores_fabricaciones', ProductoresFabricacionController::class);

/* BUSCADORES */
Route::get('/localidades/search/{nombre}', [LocalidadController::class, 'query'])->name('localidades.search');
/* BUSCADORES */
