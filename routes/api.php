<?php

use App\Http\Controllers\Api\CervezaController;
use App\Http\Controllers\Api\CervezasColorController;
use App\Http\Controllers\Api\CervezasEnvaseTipoController;
use App\Http\Controllers\Api\CervezasEstiloController;
use App\Http\Controllers\Api\CervezasFamiliaController;
use App\Http\Controllers\Api\CervezasFermentoController;
use App\Http\Controllers\Api\LocalidadController;
use App\Http\Controllers\Api\LugarController;
use App\Http\Controllers\Api\LugaresCategoriaController;
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

Route::get('cervezas', [CervezaController::class, 'index'])->name('cervezas.index');
Route::get('cervezas/{cerveza}', [CervezaController::class, 'show'])->name('cervezas.show');
Route::get('cervezas_colores', [CervezasColorController::class, 'index'])->name('cervezas_colores.index');
Route::get('cervezas_colores/{cervezas_color}', [CervezasColorController::class, 'show'])->name('cervezas_colores.show');
Route::get('cervezas_envases_tipos', [CervezasEnvaseTipoController::class, 'index'])->name('cervezas_envases_tipos.index');
Route::get('cervezas_envases_tipos/{cervezas_envases_tipo}', [CervezasEnvaseTipoController::class, 'show'])->name('cervezas_envases_tipos.show');
Route::get('cervezas_estilos', [CervezasEstiloController::class, 'index'])->name('cervezas_estilos.index');
Route::get('cervezas_estilos/{cervezas_estilo}', [CervezasEstiloController::class, 'show'])->name('cervezas_estilos.show');
Route::get('cervezas_familias', [CervezasFamiliaController::class, 'index'])->name('cervezas_familias.index');
Route::get('cervezas_familias/{cervezas_familia}', [CervezasFamiliaController::class, 'show'])->name('cervezas_familias.show');
Route::get('cervezas_fermentos', [CervezasFermentoController::class, 'index'])->name('cervezas_fermentos.index');
Route::get('cervezas_fermentos/{cervezas_fermento}', [CervezasFermentoController::class, 'show'])->name('cervezas_fermentos.show');
Route::get('localidades', [LocalidadController::class, 'index'])->name('localidades.index');
Route::get('localidades/{localidad}', [LocalidadController::class, 'show'])->name('localidades.show');
Route::get('lugares', [LugarController::class, 'index'])->name('lugares.index');
Route::get('lugares/{lugar}', [LugarController::class, 'show'])->name('lugares.show');
Route::get('lugares_categorias', [LugaresCategoriaController::class, 'index'])->name('lugares_categorias.index');
Route::get('lugares_categorias/{lugares_categoria}', [LugaresCategoriaController::class, 'show'])->name('lugares_categorias.show');
Route::get('productores', [ProductorController::class, 'index'])->name('productores.index');
Route::get('productores/{productor}', [ProductorController::class, 'show'])->name('productores.show');
Route::get('productores_fabricaciones', [ProductoresFabricacionController::class, 'index'])->name('productores_fabricaciones.index');
Route::get('productores_fabricaciones/{productor}', [ProductoresFabricacionController::class, 'show'])->name('productores_fabricaciones.show');

/* BUSCADORES */
Route::get('/localidades/search/{nombre}', [LocalidadController::class, 'query'])->name('localidades.search');
/* BUSCADORES */
