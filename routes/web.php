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

Route::controller(ContinenteController::class)->group(function () {
    Route::get('continentes', 'index')->name('continentes.index');
    Route::get('continentes/create', 'create')->name('continentes.create');
    Route::get('continentes/{continente}', 'show')->name('continentes.show');
});

Route::controller(PaisController::class)->group(function () {
    Route::get('paises', 'index')->name('paises.index');
    Route::get('paises/create', 'create')->name('paises.create');
    Route::get('paises/{pais}', 'show')->name('paises.show');
});

Route::controller(DivisionPoliticaController::class)->group(function () {
    Route::get('divisiones_politicas', 'index')->name('divisiones_politicas.index');
    Route::get('divisiones_politicas/create', 'create')->name('divisiones_politicas.create');
    Route::get('divisiones_politicas/{division_politica}', 'show')->name('divisiones_politicas.show');
});

Route::controller(DivisionPoliticaTipoController::class)->group(function () {
    Route::get('divisiones_politicas_tipos', 'index')->name('divisiones_politicas_tipos.index');
    Route::get('divisiones_politicas_tipos/create', 'create')->name('divisiones_politicas_tipos.create');
    Route::get('divisiones_politicas_tipos/{divisiones_politicas_tipo}', 'show')->name('divisiones_politicas_tipos.show');
});

Route::controller(LocalidadController::class)->group(function () {
    Route::get('localidades', 'index')->name('localidades.index');
    Route::get('localidades/create', 'create')->name('localidades.create');
    Route::get('localidades/{localidad}', 'show')->name('localidades.show');
});

Route::controller(PersonaController::class)->group(function () {
    Route::get('personas', 'index')->name('personas.index');
    Route::get('personas/create', 'create')->name('personas.create');
    Route::get('personas/{persona}', 'show')->name('personas.show');
});

Route::controller(UsuarioController::class)->group(function () {
    Route::get('usuarios', 'index')->name('usuarios.index');
    Route::get('usuarios/create', 'create')->name('usuarios.create');
    Route::get('usuarios/{persona}', 'show')->name('usuarios.show');
});
