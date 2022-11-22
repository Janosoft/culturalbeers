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
use App\Http\Controllers\CervezaController;
use App\Http\Controllers\CervezasColorController;
use App\Http\Controllers\CervezasEnvaseController;
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
    Route::get('usuarios/{usuario}', 'show')->name('usuarios.show');
});

Route::controller(CervezaController::class)->group(function () {
    Route::get('cervezas', 'index')->name('cervezas.index');
    Route::get('cervezas/create', 'create')->name('cervezas.create');
    Route::get('cervezas/{cerveza}', 'show')->name('cervezas.show');
});

Route::controller(CervezasColorController::class)->group(function () {
    Route::get('cervezas_colores', 'index')->name('cervezas_colores.index');
    Route::get('cervezas_colores/create', 'create')->name('cervezas_colores.create');
    Route::get('cervezas_colores/{cervezas_color}', 'show')->name('cervezas_colores.show');
});

Route::controller(CervezasEnvaseController::class)->group(function () {
    Route::get('cervezas_envases', 'index')->name('cervezas_envases.index');
    Route::get('cervezas_envases/create', 'create')->name('cervezas_envases.create');
    Route::get('cervezas_envases/{cervezas_envase}', 'show')->name('cervezas_envases.show');
});

Route::controller(CervezasEstiloController::class)->group(function () {
    Route::get('cervezas_estilos', 'index')->name('cervezas_estilos.index');
    Route::get('cervezas_estilos/create', 'create')->name('cervezas_estilos.create');
    Route::get('cervezas_estilos/{cervezas_estilo}', 'show')->name('cervezas_estilos.show');
});

Route::controller(CervezasFamiliaController::class)->group(function () {
    Route::get('cervezas_familias', 'index')->name('cervezas_familias.index');
    Route::get('cervezas_familias/create', 'create')->name('cervezas_familias.create');
    Route::get('cervezas_familias/{cervezas_familia}', 'show')->name('cervezas_familias.show');
});

Route::controller(CervezasFermentoController::class)->group(function () {
    Route::get('cervezas_fermentos', 'index')->name('cervezas_fermentos.index');
    Route::get('cervezas_fermentos/create', 'create')->name('cervezas_fermentos.create');
    Route::get('cervezas_fermentos/{cervezas_fermento}', 'show')->name('cervezas_fermentos.show');
});

Route::controller(ProductorController::class)->group(function () {
    Route::get('productores', 'index')->name('productores.index');
    Route::get('productores/create', 'create')->name('productores.create');
    Route::get('productores/{productor}', 'show')->name('productores.show');
});


Route::controller(ProductoresFabricacionController::class)->group(function () {
    Route::get('productores_fabricaciones', 'index')->name('productores_fabricaciones.index');
    Route::get('productores_fabricaciones/create', 'create')->name('productores_fabricaciones.create');
    Route::get('productores_fabricaciones/{productores_fabricacion}', 'show')->name('productores_fabricaciones.show');
});