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

Route::controller(ContinenteController::class)->group(function () {
    Route::get('continentes', 'index')->name('continentes.index');
    Route::get('continentes/create', 'create')->name('continentes.create');
    Route::post('continentes/create', 'store')->name('continentes.store');
    Route::get('continentes/{continente}', 'show')->name('continentes.show');
    Route::get('continentes/{continente}/edit', 'edit')->name('continentes.edit');
    Route::put('continentes/{continente}', 'update')->name('continentes.update');
    Route::delete('continentes/{continente}', 'destroy')->name('continentes.destroy');
});

Route::controller(PaisController::class)->group(function () {
    Route::get('paises', 'index')->name('paises.index');
    Route::get('paises/create', 'create')->name('paises.create');
    Route::post('paises/create', 'store')->name('paises.store');
    Route::get('paises/{pais}', 'show')->name('paises.show');
    Route::get('paises/{pais}/edit', 'edit')->name('paises.edit');
    Route::put('paises/{pais}', 'update')->name('paises.update');
    Route::delete('paises/{pais}', 'destroy')->name('paises.destroy');
});

Route::controller(DivisionPoliticaController::class)->group(function () {
    Route::get('divisiones_politicas', 'index')->name('divisiones_politicas.index');
    Route::get('divisiones_politicas/create', 'create')->name('divisiones_politicas.create');
    Route::post('divisiones_politicas/create', 'store')->name('divisiones_politicas.store');
    Route::get('divisiones_politicas/{division_politica}', 'show')->name('divisiones_politicas.show');
    Route::get('divisiones_politicas/{division_politica}/edit', 'edit')->name('divisiones_politicas.edit');
    Route::put('divisiones_politicas/{division_politica}', 'update')->name('divisiones_politicas.update');
    Route::delete('divisiones_politicas/{division_politica}', 'destroy')->name('divisiones_politicas.destroy');
});

Route::controller(DivisionPoliticaTipoController::class)->group(function () {
    Route::get('divisiones_politicas_tipos', 'index')->name('divisiones_politicas_tipos.index');
    Route::get('divisiones_politicas_tipos/create', 'create')->name('divisiones_politicas_tipos.create');
    Route::post('divisiones_politicas_tipos/create', 'store')->name('divisiones_politicas_tipos.store');
    Route::get('divisiones_politicas_tipos/{divisiones_politicas_tipo}', 'show')->name('divisiones_politicas_tipos.show');
    Route::get('divisiones_politicas_tipos/{divisiones_politicas_tipo}/edit', 'edit')->name('divisiones_politicas_tipos.edit');
    Route::put('divisiones_politicas_tipos/{divisiones_politicas_tipo}', 'update')->name('divisiones_politicas_tipos.update');
    Route::delete('divisiones_politicas_tipos/{divisiones_politicas_tipo}', 'destroy')->name('divisiones_politicas_tipos.destroy');
});

Route::controller(LocalidadController::class)->group(function () {
    Route::get('localidades', 'index')->name('localidades.index');
    Route::get('localidades/create', 'create')->name('localidades.create');
    Route::post('localidades/create', 'store')->name('localidades.store');
    Route::get('localidades/{localidad}', 'show')->name('localidades.show');
    Route::get('localidades/{localidad}/edit', 'edit')->name('localidades.edit');
    Route::put('localidades/{localidad}', 'update')->name('localidades.update');
    Route::delete('localidades/{localidad}', 'destroy')->name('localidades.destroy');
});

Route::controller(PersonaController::class)->group(function () {
    Route::get('personas', 'index')->name('personas.index');
    Route::get('personas/create', 'create')->name('personas.create');
    Route::post('personas/create', 'store')->name('personas.store');
    Route::get('personas/{persona}', 'show')->name('personas.show');
    Route::get('personas/{persona}/edit', 'edit')->name('personas.edit');
    Route::put('personas/{persona}', 'update')->name('personas.update');
    Route::delete('personas/{persona}', 'destroy')->name('personas.destroy');
});

Route::controller(UsuarioController::class)->group(function () {
    Route::get('usuarios', 'index')->name('usuarios.index');
    Route::get('usuarios/create', 'create')->name('usuarios.create');
    Route::post('cervezas_colores/create', 'store')->name('usuarios.store');
    Route::get('usuarios/{usuario}', 'show')->name('usuarios.show');
    Route::get('usuarios/{usuario}/edit', 'edit')->name('usuarios.edit');
    Route::put('usuarios/{usuario}', 'update')->name('usuarios.update');
    Route::delete('usuarios/{usuario}', 'destroy')->name('usuarios.destroy');
});

Route::controller(CervezaController::class)->group(function () {
    Route::get('cervezas', 'index')->name('cervezas.index');
    Route::get('cervezas/create', 'create')->name('cervezas.create');
    Route::post('cervezas/create', 'store')->name('cervezas.store');
    Route::get('cervezas/{cerveza}', 'show')->name('cervezas.show');
    Route::get('cervezas/{cerveza}/edit', 'edit')->name('cervezas.edit');
    Route::put('cervezas/{cerveza}', 'update')->name('cervezas.update');
    Route::delete('cervezas/{cerveza}', 'destroy')->name('cervezas.destroy');
});

Route::controller(CervezasColorController::class)->group(function () {
    Route::get('cervezas_colores', 'index')->name('cervezas_colores.index');
    Route::get('cervezas_colores/create', 'create')->name('cervezas_colores.create');
    Route::post('cervezas_colores/create', 'store')->name('cervezas_colores.store');
    Route::get('cervezas_colores/{cervezas_color}', 'show')->name('cervezas_colores.show');
    Route::get('cervezas_colores/{cervezas_color}/edit', 'edit')->name('cervezas_colores.edit');
    Route::put('cervezas_colores/{cervezas_color}', 'update')->name('cervezas_colores.update');
    Route::delete('cervezas_colores/{cervezas_color}', 'destroy')->name('cervezas_colores.destroy');
});

Route::controller(CervezasEnvaseTipoController::class)->group(function () {
    Route::get('cervezas_envases_tipos', 'index')->name('cervezas_envases_tipos.index');
    Route::get('cervezas_envases_tipos/create', 'create')->name('cervezas_envases_tipos.create');
    Route::post('cervezas_envases_tipos/create', 'store')->name('cervezas_envases_tipos.store');
    Route::get('cervezas_envases_tipos/{cervezas_envase_tipo}', 'show')->name('cervezas_envases_tipos.show');
    Route::get('cervezas_envases_tipos/{cervezas_envase_tipo}/edit', 'edit')->name('cervezas_envases_tipos.edit');
    Route::put('cervezas_envases_tipos/{cervezas_envase_tipo}', 'update')->name('cervezas_envases_tipos.update');
    Route::delete('cervezas_envases_tipos/{cervezas_envase_tipo}', 'destroy')->name('cervezas_envases_tipos.destroy');
});

Route::controller(CervezasEstiloController::class)->group(function () {
    Route::get('cervezas_estilos', 'index')->name('cervezas_estilos.index');
    Route::get('cervezas_estilos/create', 'create')->name('cervezas_estilos.create');
    Route::post('cervezas_estilos/create', 'store')->name('cervezas_estilos.store');
    Route::get('cervezas_estilos/{cervezas_estilo}', 'show')->name('cervezas_estilos.show');
    Route::get('cervezas_estilos/{cervezas_estilo}/edit', 'edit')->name('cervezas_estilos.edit');
    Route::put('cervezas_estilos/{cervezas_estilo}', 'update')->name('cervezas_estilos.update');
    Route::delete('cervezas_estilos/{cervezas_estilo}', 'destroy')->name('cervezas_estilos.destroy');
});

Route::controller(CervezasFamiliaController::class)->group(function () {
    Route::get('cervezas_familias', 'index')->name('cervezas_familias.index');
    Route::get('cervezas_familias/create', 'create')->name('cervezas_familias.create');
    Route::post('cervezas_familias/create', 'store')->name('cervezas_familias.store');
    Route::get('cervezas_familias/{cervezas_familia}', 'show')->name('cervezas_familias.show');
    Route::get('cervezas_familias/{cervezas_familia}/edit', 'edit')->name('cervezas_familias.edit');
    Route::put('cervezas_familias/{cervezas_familia}', 'update')->name('cervezas_familias.update');
    Route::delete('cervezas_familias/{cervezas_familia}', 'destroy')->name('cervezas_familias.destroy');
});

Route::controller(CervezasFermentoController::class)->group(function () {
    Route::get('cervezas_fermentos', 'index')->name('cervezas_fermentos.index');
    Route::get('cervezas_fermentos/create', 'create')->name('cervezas_fermentos.create');
    Route::post('cervezas_fermentos/create', 'store')->name('cervezas_fermentos.store');
    Route::get('cervezas_fermentos/{cervezas_fermento}', 'show')->name('cervezas_fermentos.show');
    Route::get('cervezas_fermentos/{cervezas_fermento}/edit', 'edit')->name('cervezas_fermentos.edit');
    Route::put('cervezas_fermentos/{cervezas_fermento}', 'update')->name('cervezas_fermentos.update');
    Route::delete('cervezas_fermentos/{cervezas_fermento}', 'destroy')->name('cervezas_fermentos.destroy');
});

Route::controller(ProductorController::class)->group(function () {
    Route::get('productores', 'index')->name('productores.index');
    Route::get('productores/create', 'create')->name('productores.create');
    Route::post('productores/create', 'store')->name('productores.store');
    Route::get('productores/{productor}', 'show')->name('productores.show');
    Route::get('productores/{productor}/edit', 'edit')->name('productores.edit');
    Route::put('productores/{productor}', 'update')->name('productores.update');
    Route::delete('productores/{productor}', 'destroy')->name('productores.destroy');
});

Route::controller(ProductoresFabricacionController::class)->group(function () {
    Route::get('productores_fabricaciones', 'index')->name('productores_fabricaciones.index');
    Route::get('productores_fabricaciones/create', 'create')->name('productores_fabricaciones.create');
    Route::post('productores_fabricaciones/create', 'store')->name('productores_fabricaciones.store');
    Route::get('productores_fabricaciones/{productores_fabricacion}', 'show')->name('productores_fabricaciones.show');
    Route::get('productores_fabricaciones/{productores_fabricacion}/edit', 'edit')->name('productores_fabricaciones.edit');
    Route::put('productores_fabricaciones/{productores_fabricacion}', 'update')->name('productores_fabricaciones.update');
    Route::delete('productores_fabricaciones/{productores_fabricacion}', 'destroy')->name('productores_fabricaciones.destroy');
});
