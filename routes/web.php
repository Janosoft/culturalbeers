<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ContinenteController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\DivisionPoliticaController;
use App\Http\Controllers\DivisionesPoliticasTipoController;
use App\Http\Controllers\LocalidadController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CervezaController;
use App\Http\Controllers\CervezasColorController;
use App\Http\Controllers\CervezasEnvaseTipoController;
use App\Http\Controllers\CervezasEstiloController;
use App\Http\Controllers\CervezasFamiliaController;
use App\Http\Controllers\CervezasFermentoController;
use App\Http\Controllers\ProductorController;
use App\Http\Controllers\ProductoresFabricacionController;

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

Route::get('/', InicioController::class);

Route::resource('cervezas', CervezaController::class);
Route::resource('cervezas_colores', CervezasColorController::class)->parameters(['cervezas_colores' => 'cervezas_color']);
Route::resource('cervezas_envases_tipos', CervezasEnvaseTipoController::class);
Route::resource('cervezas_estilos', CervezasEstiloController::class);
Route::resource('cervezas_familias', CervezasFamiliaController::class);
Route::resource('cervezas_fermentos', CervezasFermentoController::class);
Route::resource('continentes', ContinenteController::class);
Route::resource('divisiones_politicas', DivisionPoliticaController::class)->parameters(['divisiones_politicas' => 'division_politica']);
Route::resource('divisiones_politicas_tipos', DivisionesPoliticasTipoController::class)->parameters(['divisiones_politicas_tipos' => 'divisiones_politicas_tipo']);
Route::resource('localidades', LocalidadController::class)->parameters(['localidades' => 'localidad']);
Route::resource('paises', PaisController::class)->parameters(['paises' => 'pais']);
Route::resource('personas', PersonaController::class);
Route::resource('productores', ProductorController::class)->parameters(['productores' => 'productor']);
Route::resource('productores_fabricaciones', ProductoresFabricacionController::class)->parameters(['productores' => 'productores_fabricaciones']);
Route::resource('usuarios', UsuarioController::class);
