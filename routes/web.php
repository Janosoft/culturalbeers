<?php

use App\Http\Controllers\CervezaController;
use App\Http\Controllers\CervezasColorController;
use App\Http\Controllers\CervezasEnvaseTipoController;
use App\Http\Controllers\CervezasEstiloController;
use App\Http\Controllers\CervezasFamiliaController;
use App\Http\Controllers\CervezasFermentoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ContinenteController;
use App\Http\Controllers\DivisionesPoliticasTipoController;
use App\Http\Controllers\DivisionPoliticaController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LocalidadController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProductorController;
use App\Http\Controllers\ProductoresFabricacionController;
use App\Http\Controllers\SeachController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', InicioController::class)->name('inicio');
Route::get('search', [SeachController::class, 'search'])->name('search');
Route::get('contacto', [ContactoController::class, 'index'])->name('contacto.index');
Route::post('contacto', [ContactoController::class, 'store'])->name('contacto.store');

Route::resource('cervezas', CervezaController::class);
Route::resource('cervezas_colores', CervezasColorController::class);
Route::resource('cervezas_envases_tipos', CervezasEnvaseTipoController::class)->parameters(['cervezas_envases_tipos' => 'cervezas_envases_tipo']);
Route::resource('cervezas_estilos', CervezasEstiloController::class);
Route::resource('cervezas_familias', CervezasFamiliaController::class);
Route::resource('cervezas_fermentos', CervezasFermentoController::class);
Route::resource('continentes', ContinenteController::class)->parameters(['continentes' => 'continente']);
Route::resource('divisiones_politicas', DivisionPoliticaController::class)->parameters(['divisiones_politicas' => 'division_politica']);
Route::resource('divisiones_politicas_tipos', DivisionesPoliticasTipoController::class);
Route::resource('localidades', LocalidadController::class);
Route::resource('paises', PaisController::class);
Route::resource('personas', PersonaController::class);
Route::resource('productores_fabricaciones', ProductoresFabricacionController::class)->parameters(['productores_fabricaciones' => 'productores_fabricacion']);

/* USUARIOS */
Route::get('account', [UsuarioController::class, 'account'])->name('account');
Route::resource('usuarios', UsuarioController::class);
/* USUARIOS */

/* PRODUCTORES */
Route::resource('productores', ProductorController::class);
Route::get('productores/{productor}/verify', [ProductorController::class, 'verify'])->name('productores.verify');
/* PRODUCTORES */

/* IMAGENES */
Route::get('imagenes/{imagen}', [ImagenController::class, 'show'])->name('imagenes.show');
/* IMAGENES */

/* COMENTARIOS */
Route::get('comentarios', [ComentarioController::class, 'index'])->name('comentarios.index');
Route::get('comentarios/{comentario}/offensive', [ComentarioController::class, 'offensive'])->name('comentarios.offensive');
Route::get('comentarios/{comentario}/authorized', [ComentarioController::class, 'authorized'])->name('comentarios.authorized');
Route::delete('comentarios/{comentario}', [ComentarioController::class, 'destroy'])->name('comentarios.destroy');
Route::post('cervezas/{cerveza}/comment', [CervezaController::class, 'comment'])->name('cervezas.comment');
Route::post('cervezas_estilos/{cervezas_estilo}/comment', [CervezasEstiloController::class, 'comment'])->name('cervezas_estilos.comment');
Route::post('cervezas_familias/{cervezas_familia}/comment', [CervezasFamiliaController::class, 'comment'])->name('cervezas_familias.comment');
Route::post('cervezas_fermentos/{cervezas_fermento}/comment', [CervezasFermentoController::class, 'comment'])->name('cervezas_fermentos.comment');
Route::post('localidades/{localidad}/comment', [LocalidadController::class, 'comment'])->name('localidades.comment');
Route::post('productores/{productor}/comment', [ProductorController::class, 'comment'])->name('productores.comment');
/* COMENTARIOS */
