<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ContinenteController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\DivisionPoliticaController;
use App\Http\Controllers\DivisionPoliticaTipoController;
use App\Http\Controllers\LocalidadController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\UsuarioController;

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
Route::get('continentes', [ContinenteController::class, 'index']);
Route::get('continentes/create', [ContinenteController::class, 'create']);
Route::get('continentes/{continente}', [ContinenteController::class, 'show']);

Route::get('paises', [PaisController::class, 'index']);
Route::get('paises/create', [PaisController::class, 'create']);
Route::get('paises/{pais}', [PaisController::class, 'show']);

Route::get('divisiones_politicas', [DivisionPoliticaController::class, 'index']);
Route::get('divisiones_politicas/create', [DivisionPoliticaController::class, 'create']);
Route::get('divisiones_politicas/{division_politica}', [DivisionPoliticaController::class, 'show']);

Route::get('divisiones_politicas_tipos', [DivisionPoliticaTipoController::class, 'index']);
Route::get('divisiones_politicas_tipos/create', [DivisionPoliticaTipoController::class, 'create']);
Route::get('divisiones_politicas_tipos/{divisiones_politicas_tipo}', [DivisionPoliticaTipoController::class, 'show']);

Route::get('localidades', [LocalidadController::class, 'index']);
Route::get('localidades/create', [LocalidadController::class, 'create']);
Route::get('localidades/{localidad}', [LocalidadController::class, 'show']);

Route::get('personas', [PersonaController::class, 'index']);
Route::get('personas/create', [PersonaController::class, 'create']);
Route::get('personas/{persona}', [PersonaController::class, 'show']);

Route::get('usuarios', [UsuarioController::class, 'index']);
Route::get('usuarios/create', [UsuarioController::class, 'create']);
Route::get('usuarios/{usuario}', [UsuarioController::class, 'show']);
