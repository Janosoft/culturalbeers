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
use App\Http\Controllers\LugarController;
use App\Http\Controllers\LugaresCategoriaController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\ProductorController;
use App\Http\Controllers\ProductoresFabricacionController;
use App\Http\Controllers\SeachController;
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

Route::get('/', InicioController::class, 'inicio')->name('inicio');
Route::get('search', [SeachController::class, 'search'])->name('search');
Route::get('contacto', [ContactoController::class, 'index'])->name('contacto.index');
Route::post('contacto', [ContactoController::class, 'store'])->name('contacto.store');

/* CERVEZAS */
Route::get('cervezas', [CervezaController::class, 'index'])->name('cervezas.index');
Route::post('cervezas', [CervezaController::class, 'store'])->middleware('auth')->name('cervezas.store');
Route::get('cervezas/create', [CervezaController::class, 'create'])->middleware('auth')->name('cervezas.create');
Route::get('cervezas/{cerveza}', [CervezaController::class, 'show'])->name('cervezas.show');
Route::match(['put', 'patch'], 'cervezas/{cerveza}', [CervezaController::class, 'update'])->middleware('auth')->name('cervezas.update');
Route::delete('cervezas/{cerveza}', [CervezaController::class, 'destroy'])->middleware('auth')->name('cervezas.destroy');
Route::get('cervezas/{cerveza}/edit', [CervezaController::class, 'edit'])->middleware('auth')->name('cervezas.edit');
Route::get('restore/cervezas/{cerveza_id}', [CervezaController::class, 'restore'])->middleware('auth')->name('cervezas.restore');
Route::get('forcedelete/cervezas/{cerveza_id}', [CervezaController::class, 'forcedelete'])->middleware('auth')->name('cervezas.forcedelete');
Route::post('comment/cervezas/{cerveza}', [CervezaController::class, 'comment'])->middleware('auth')->name('cervezas.comment');
Route::get('taste/cervezas/{cerveza}', [CervezaController::class, 'taste'])->middleware('auth')->name('cervezas.taste');
Route::get('untaste/cervezas/{cerveza}', [CervezaController::class, 'untaste'])->middleware('auth')->name('cervezas.untaste');
Route::post('rate/cervezas/{cerveza}', [CervezaController::class, 'rate'])->middleware('auth')->name('cervezas.rate');
/* CERVEZAS */

/* CERVEZAS COLORES */
Route::get('cervezas_colores', [CervezasColorController::class, 'index'])->name('cervezas_colores.index');
Route::post('cervezas_colores', [CervezasColorController::class, 'store'])->middleware('auth')->name('cervezas_colores.store');
Route::get('cervezas_colores/create', [CervezasColorController::class, 'create'])->middleware('auth')->name('cervezas_colores.create');
Route::get('cervezas_colores/{cervezas_color}', [CervezasColorController::class, 'show'])->name('cervezas_colores.show');
Route::match(['put', 'patch'], 'cervezas_colores/{cervezas_color}', [CervezasColorController::class, 'update'])->middleware('auth')->name('cervezas_colores.update');
Route::delete('cervezas_colores/{cervezas_color}', [CervezasColorController::class, 'destroy'])->middleware('auth')->name('cervezas_colores.destroy');
Route::get('cervezas_colores/{cervezas_color}/edit', [CervezasColorController::class, 'edit'])->middleware('auth')->name('cervezas_colores.edit');
Route::get('restore/cervezas_colores/{color_id}', [CervezasColorController::class, 'restore'])->middleware('auth')->name('cervezas_colores.restore');
Route::get('forcedelete/cervezas_colores/{color_id}', [CervezasColorController::class, 'forcedelete'])->middleware('auth')->name('cervezas_colores.forcedelete');
/* CERVEZAS COLORES */

/* CERVEZAS ENVASES TIPOS */
Route::get('cervezas_envases_tipos', [CervezasEnvaseTipoController::class, 'index'])->name('cervezas_envases_tipos.index');
Route::post('cervezas_envases_tipos', [CervezasEnvaseTipoController::class, 'store'])->middleware('auth')->name('cervezas_envases_tipos.store');
Route::get('cervezas_envases_tipos/create', [CervezasEnvaseTipoController::class, 'create'])->middleware('auth')->name('cervezas_envases_tipos.create');
Route::get('cervezas_envases_tipos/{cervezas_envases_tipo}', [CervezasEnvaseTipoController::class, 'show'])->name('cervezas_envases_tipos.show');
Route::match(['put', 'patch'], 'cervezas_envases_tipos/{cervezas_envases_tipo}', [CervezasEnvaseTipoController::class, 'update'])->middleware('auth')->name('cervezas_envases_tipos.update');
Route::delete('cervezas_envases_tipos/{cervezas_envases_tipo}', [CervezasEnvaseTipoController::class, 'destroy'])->middleware('auth')->name('cervezas_envases_tipos.destroy');
Route::get('cervezas_envases_tipos/{cervezas_envases_tipo}/edit', [CervezasEnvaseTipoController::class, 'edit'])->middleware('auth')->name('cervezas_envases_tipos.edit');
Route::get('restore/cervezas_envases_tipos/{envase_id}', [CervezasEnvaseTipoController::class, 'restore'])->middleware('auth')->name('cervezas_envases_tipos.restore');
Route::get('forcedelete/cervezas_envases_tipos/{envase_id}', [CervezasEnvaseTipoController::class, 'forcedelete'])->middleware('auth')->name('cervezas_envases_tipos.forcedelete');
/* CERVEZAS ENVASES TIPOS */

/* CERVEZAS ESTILOS */
Route::get('cervezas_estilos', [CervezasEstiloController::class, 'index'])->name('cervezas_estilos.index');
Route::post('cervezas_estilos', [CervezasEstiloController::class, 'store'])->middleware('auth')->name('cervezas_estilos.store');
Route::get('cervezas_estilos/create', [CervezasEstiloController::class, 'create'])->middleware('auth')->name('cervezas_estilos.create');
Route::get('cervezas_estilos/{cervezas_estilo}', [CervezasEstiloController::class, 'show'])->name('cervezas_estilos.show');
Route::match(['put', 'patch'], 'cervezas_estilos/{cervezas_estilo}', [CervezasEstiloController::class, 'update'])->middleware('auth')->name('cervezas_estilos.update');
Route::delete('cervezas_estilos/{cervezas_estilo}', [CervezasEstiloController::class, 'destroy'])->middleware('auth')->name('cervezas_estilos.destroy');
Route::get('cervezas_estilos/{cervezas_estilo}/edit', [CervezasEstiloController::class, 'edit'])->middleware('auth')->name('cervezas_estilos.edit');
Route::get('restore/cervezas_estilos/{estilo_id}', [CervezasEstiloController::class, 'restore'])->middleware('auth')->name('cervezas_estilos.restore');
Route::get('forcedelete/cervezas_estilos/{estilo_id}', [CervezasEstiloController::class, 'forcedelete'])->middleware('auth')->name('cervezas_estilos.forcedelete');
Route::post('comment/cervezas_estilos/{cervezas_estilo}', [CervezasEstiloController::class, 'comment'])->middleware('auth')->name('cervezas_estilos.comment');
/* CERVEZAS ESTILOS */

/* CERVEZAS FAMILIAS */
Route::get('cervezas_familias', [CervezasFamiliaController::class, 'index'])->name('cervezas_familias.index');
Route::post('cervezas_familias', [CervezasFamiliaController::class, 'store'])->middleware('auth')->name('cervezas_familias.store');
Route::get('cervezas_familias/create', [CervezasFamiliaController::class, 'create'])->middleware('auth')->name('cervezas_familias.create');
Route::get('cervezas_familias/{cervezas_familia}', [CervezasFamiliaController::class, 'show'])->name('cervezas_familias.show');
Route::match(['put', 'patch'], 'cervezas_familias/{cervezas_familia}', [CervezasFamiliaController::class, 'update'])->middleware('auth')->name('cervezas_familias.update');
Route::delete('cervezas_familias/{cervezas_familia}', [CervezasFamiliaController::class, 'destroy'])->middleware('auth')->name('cervezas_familias.destroy');
Route::get('cervezas_familias/{cervezas_familia}/edit', [CervezasFamiliaController::class, 'edit'])->middleware('auth')->name('cervezas_familias.edit');
Route::get('restore/cervezas_familias/{familia_id}', [CervezasFamiliaController::class, 'restore'])->middleware('auth')->name('cervezas_familias.restore');
Route::get('forcedelete/cervezas_familias/{familia_id}', [CervezasFamiliaController::class, 'forcedelete'])->middleware('auth')->name('cervezas_familias.forcedelete');
Route::post('comment/cervezas_familias/{cervezas_familia}', [CervezasFamiliaController::class, 'comment'])->middleware('auth')->name('cervezas_familias.comment');
/* CERVEZAS FAMILIAS */

/* CERVEZAS FERMENTOS */
Route::get('cervezas_fermentos', [CervezasFermentoController::class, 'index'])->name('cervezas_fermentos.index');
Route::post('cervezas_fermentos', [CervezasFermentoController::class, 'store'])->middleware('auth')->name('cervezas_fermentos.store');
Route::get('cervezas_fermentos/create', [CervezasFermentoController::class, 'create'])->middleware('auth')->name('cervezas_fermentos.create');
Route::get('cervezas_fermentos/{cervezas_fermento}', [CervezasFermentoController::class, 'show'])->name('cervezas_fermentos.show');
Route::match(['put', 'patch'], 'cervezas_fermentos/{cervezas_fermento}', [CervezasFermentoController::class, 'update'])->middleware('auth')->name('cervezas_fermentos.update');
Route::delete('cervezas_fermentos/{cervezas_fermento}', [CervezasFermentoController::class, 'destroy'])->middleware('auth')->name('cervezas_fermentos.destroy');
Route::get('cervezas_fermentos/{cervezas_fermento}/edit', [CervezasFermentoController::class, 'edit'])->middleware('auth')->name('cervezas_fermentos.edit');
Route::get('restore/cervezas_fermentos/{fermento_id}', [CervezasFermentoController::class, 'restore'])->middleware('auth')->name('cervezas_fermentos.restore');
Route::get('forcedelete/cervezas_fermentos/{fermento_id}', [CervezasFermentoController::class, 'forcedelete'])->middleware('auth')->name('cervezas_fermentos.forcedelete');
Route::post('comment/cervezas_fermentos/{cervezas_fermento}', [CervezasFermentoController::class, 'comment'])->middleware('auth')->name('cervezas_fermentos.comment');
/* CERVEZAS FERMENTOS */

/* COMENTARIOS */
Route::get('comentarios', [ComentarioController::class, 'index'])->name('comentarios.index');
Route::delete('comentarios/{comentario}', [ComentarioController::class, 'destroy'])->middleware('auth')->name('comentarios.destroy');
Route::get('offensive/comentarios/{comentario}', [ComentarioController::class, 'offensive'])->middleware('auth')->name('comentarios.offensive');
Route::get('authorized/comentarios/{comentario}', [ComentarioController::class, 'authorized'])->middleware('auth')->name('comentarios.authorized');
/* COMENTARIOS */

/* CONTINENTES */
Route::get('continentes', [ContinenteController::class, 'index'])->name('continentes.index');
Route::post('continentes', [ContinenteController::class, 'store'])->name('continentes.store');
Route::get('continentes/create', [ContinenteController::class, 'create'])->middleware('auth')->name('continentes.create');
Route::get('continentes/{continente}', [ContinenteController::class, 'show'])->name('continentes.show');
Route::match(['put', 'patch'], 'continentes/{continente}', [ContinenteController::class, 'update'])->middleware('auth')->name('continentes.update');
Route::delete('continentes/{continente}', [ContinenteController::class, 'destroy'])->middleware('auth')->name('continentes.destroy');
Route::get('continentes/{continente}/edit', [ContinenteController::class, 'edit'])->middleware('auth')->name('continentes.edit');
Route::get('restore/continentes/{continente_id}', [ContinenteController::class, 'restore'])->middleware('auth')->name('continentes.restore');
Route::get('forcedelete/continentes/{continente_id}', [ContinenteController::class, 'forcedelete'])->middleware('auth')->name('continentes.forcedelete');
/* CONTINENTES */

/* DIVISIONES POLITICAS */
Route::get('divisiones_politicas', [DivisionPoliticaController::class, 'index'])->name('divisiones_politicas.index');
Route::post('divisiones_politicas', [DivisionPoliticaController::class, 'store'])->middleware('auth')->name('divisiones_politicas.store');
Route::get('divisiones_politicas/create', [DivisionPoliticaController::class, 'create'])->middleware('auth')->name('divisiones_politicas.create');
Route::get('divisiones_politicas/{division_politica}', [DivisionPoliticaController::class, 'show'])->name('divisiones_politicas.show');
Route::match(['put', 'patch'], 'divisiones_politicas/{division_politica}', [DivisionPoliticaController::class, 'update'])->middleware('auth')->name('divisiones_politicas.update');
Route::delete('divisiones_politicas/{division_politica}', [DivisionPoliticaController::class, 'destroy'])->middleware('auth')->name('divisiones_politicas.destroy');
Route::get('divisiones_politicas/{division_politica}/edit', [DivisionPoliticaController::class, 'edit'])->middleware('auth')->name('divisiones_politicas.edit');
Route::get('restore/divisiones_politicas/{division_politica_id}', [DivisionPoliticaController::class, 'restore'])->middleware('auth')->name('divisiones_politicas.restore');
Route::get('forcedelete/divisiones_politicas/{division_politica_id}', [DivisionPoliticaController::class, 'forcedelete'])->middleware('auth')->name('divisiones_politicas.forcedelete');
/* DIVISIONES POLITICAS */

/* DIVISIONES POLITICAS TIPOS*/
Route::get('divisiones_politicas_tipos', [DivisionesPoliticasTipoController::class, 'index'])->name('divisiones_politicas_tipos.index');
Route::post('divisiones_politicas_tipos', [DivisionesPoliticasTipoController::class, 'store'])->middleware('auth')->name('divisiones_politicas_tipos.store');
Route::get('divisiones_politicas_tipos/create', [DivisionesPoliticasTipoController::class, 'create'])->middleware('auth')->name('divisiones_politicas_tipos.create');
Route::get('divisiones_politicas_tipos/{divisiones_politicas_tipo}', [DivisionesPoliticasTipoController::class, 'show'])->name('divisiones_politicas_tipos.show');
Route::match(['put', 'patch'], 'divisiones_politicas_tipos/{divisiones_politicas_tipo}', [DivisionesPoliticasTipoController::class, 'update'])->middleware('auth')->name('divisiones_politicas_tipos.update');
Route::delete('divisiones_politicas_tipos/{divisiones_politicas_tipo}', [DivisionesPoliticasTipoController::class, 'destroy'])->middleware('auth')->name('divisiones_politicas_tipos.destroy');
Route::get('divisiones_politicas_tipos/{divisiones_politicas_tipo}/edit', [DivisionesPoliticasTipoController::class, 'edit'])->middleware('auth')->name('divisiones_politicas_tipos.edit');
Route::get('restore/divisiones_politicas_tipos/{division_politica_tipo_id}', [DivisionesPoliticasTipoController::class, 'restore'])->middleware('auth')->name('divisiones_politicas_tipos.restore');
Route::get('forcedelete/divisiones_politicas_tipos/{division_politica_tipo_id}', [DivisionesPoliticasTipoController::class, 'forcedelete'])->middleware('auth')->name('divisiones_politicas_tipos.forcedelete');
/* DIVISIONES POLITICAS TIPOS*/

/* IMAGENES */
Route::get('imagenes/{imagen}', [ImagenController::class, 'show'])->name('imagenes.show');
/* IMAGENES */

/* LOCALIDADES */
Route::get('localidades', [LocalidadController::class, 'index'])->name('localidades.index');
Route::post('localidades', [LocalidadController::class, 'store'])->middleware('auth')->name('localidades.store');
Route::get('localidades/create', [LocalidadController::class, 'create'])->middleware('auth')->name('localidades.create');
Route::get('localidades/{localidad}', [LocalidadController::class, 'show'])->name('localidades.show');
Route::match(['put', 'patch'], 'localidades/{localidad}', [LocalidadController::class, 'update'])->middleware('auth')->name('localidades.update');
Route::delete('localidades/{localidad}', [LocalidadController::class, 'destroy'])->middleware('auth')->name('localidades.destroy');
Route::get('localidades/{localidad}/edit', [LocalidadController::class, 'edit'])->middleware('auth')->name('localidades.edit');
Route::get('restore/localidades/{localidad_id}', [LocalidadController::class, 'restore'])->middleware('auth')->name('localidades.restore');
Route::get('forcedelete/localidades/{localidad_id}', [LocalidadController::class, 'forcedelete'])->middleware('auth')->name('localidades.forcedelete');
Route::post('comment/localidades/{localidad}', [LocalidadController::class, 'comment'])->middleware('auth')->name('localidades.comment');
/* LOCALIDADES */

/* LUGARES */
Route::get('lugares', [LugarController::class, 'index'])->name('lugares.index');
Route::post('lugares', [LugarController::class, 'store'])->middleware('auth')->name('lugares.store');
Route::get('lugares/create', [LugarController::class, 'create'])->middleware('auth')->name('lugares.create');
Route::get('lugares/{lugar}', [LugarController::class, 'show'])->name('lugares.show');
Route::match(['put', 'patch'], 'lugares/{lugar}', [LugarController::class, 'update'])->middleware('auth')->name('lugares.update');
Route::delete('lugares/{lugar}', [LugarController::class, 'destroy'])->middleware('auth')->name('lugares.destroy');
Route::get('lugares/{lugar}/edit', [LugarController::class, 'edit'])->middleware('auth')->name('lugares.edit');
Route::get('restore/lugares/{lugar_id}', [LugarController::class, 'restore'])->middleware('auth')->name('lugares.restore');
Route::get('forcedelete/lugares/{lugar_id}', [LugarController::class, 'forcedelete'])->middleware('auth')->name('lugares.forcedelete');
Route::get('verify/lugares/{lugar}', [LugarController::class, 'verify'])->middleware('auth')->name('lugares.verify');
Route::post('comment/lugares/{lugar}', [LugarController::class, 'comment'])->middleware('auth')->name('lugares.comment');
/* LUGARES */

/* LUGARES CATEGORIAS */
Route::get('lugares_categorias', [LugaresCategoriaController::class, 'index'])->name('lugares_categorias.index');
Route::post('lugares_categorias', [LugaresCategoriaController::class, 'store'])->middleware('auth')->name('lugares_categorias.store');
Route::get('lugares_categorias/create', [LugaresCategoriaController::class, 'create'])->middleware('auth')->name('lugares_categorias.create');
Route::get('lugares_categorias/{lugares_categoria}', [LugaresCategoriaController::class, 'show'])->name('lugares_categorias.show');
Route::match(['put', 'patch'], 'lugares/{lugares_categoria}', [LugaresCategoriaController::class, 'update'])->middleware('auth')->name('lugares_categorias.update');
Route::delete('lugares_categorias/{lugares_categoria}', [LugaresCategoriaController::class, 'destroy'])->middleware('auth')->name('lugares_categorias.destroy');
Route::get('lugares_categorias/{lugares_categoria}/edit', [LugaresCategoriaController::class, 'edit'])->middleware('auth')->name('lugares_categorias.edit');
Route::get('restore/lugares_categorias/{categoria_id}', [LugaresCategoriaController::class, 'restore'])->middleware('auth')->name('lugares_categorias.restore');
Route::get('forcedelete/lugares_categorias/{categoria_id}', [LugaresCategoriaController::class, 'forcedelete'])->middleware('auth')->name('lugares_categorias.forcedelete');
/* LUGARES CATEGORIAS */

/* PAISES */
Route::get('paises', [PaisController::class, 'index'])->name('paises.index');
Route::post('paises', [PaisController::class, 'store'])->middleware('auth')->name('paises.store');
Route::get('paises/create', [PaisController::class, 'create'])->middleware('auth')->name('paises.create');
Route::get('paises/{pais}', [PaisController::class, 'show'])->name('paises.show');
Route::match(['put', 'patch'], 'paises/{pais}', [PaisController::class, 'update'])->middleware('auth')->name('paises.update');
Route::delete('paises/{pais}', [PaisController::class, 'destroy'])->middleware('auth')->name('paises.destroy');
Route::get('paises/{pais}/edit', [PaisController::class, 'edit'])->middleware('auth')->name('paises.edit');
Route::get('restore/paises/{pais_id}', [PaisController::class, 'restore'])->middleware('auth')->name('paises.restore');
Route::get('forcedelete/paises/{pais_id}', [PaisController::class, 'forcedelete'])->middleware('auth')->name('paises.forcedelete');
/* PAISES */

/* PRODUCTORES */
Route::get('productores', [ProductorController::class, 'index'])->name('productores.index');
Route::post('productores', [ProductorController::class, 'store'])->middleware('auth')->name('productores.store');
Route::get('productores/create', [ProductorController::class, 'create'])->middleware('auth')->name('productores.create');
Route::get('productores/{productor}', [ProductorController::class, 'show'])->name('productores.show');
Route::match(['put', 'patch'], 'productores/{productor}', [ProductorController::class, 'update'])->middleware('auth')->name('productores.update');
Route::delete('productores/{productor}', [ProductorController::class, 'destroy'])->middleware('auth')->name('productores.destroy');
Route::get('productores/{productor}/edit', [ProductorController::class, 'edit'])->middleware('auth')->name('productores.edit');
Route::get('restore/productores/{productor_id}', [ProductorController::class, 'restore'])->middleware('auth')->name('productores.restore');
Route::get('forcedelete/productores/{productor_id}', [ProductorController::class, 'forcedelete'])->middleware('auth')->name('productores.forcedelete');
Route::get('verify/productores/{productor}', [ProductorController::class, 'verify'])->middleware('auth')->name('productores.verify');
/* PRODUCTORES */

/* PRODUCTORES FABRICACIONES */
Route::get('productores_fabricaciones', [ProductoresFabricacionController::class, 'index'])->name('productores_fabricaciones.index');
Route::post('productores_fabricaciones', [ProductoresFabricacionController::class, 'store'])->middleware('auth')->name('productores_fabricaciones.store');
Route::get('productores_fabricaciones/create', [ProductoresFabricacionController::class, 'create'])->middleware('auth')->name('productores_fabricaciones.create');
Route::get('productores_fabricaciones/{productor}', [ProductoresFabricacionController::class, 'show'])->name('productores_fabricaciones.show');
Route::match(['put', 'patch'], 'productores_fabricaciones/{productor}', [ProductoresFabricacionController::class, 'update'])->middleware('auth')->name('productores_fabricaciones.update');
Route::delete('productores_fabricaciones/{productor}', [ProductoresFabricacionController::class, 'destroy'])->middleware('auth')->name('productores_fabricaciones.destroy');
Route::get('productores_fabricaciones/{productor}/edit', [ProductoresFabricacionController::class, 'edit'])->middleware('auth')->name('productores_fabricaciones.edit');
Route::get('restore/productores_fabricaciones/{fabricacion_id}', [ProductoresFabricacionController::class, 'restore'])->middleware('auth')->name('productores_fabricaciones.restore');
Route::get('forcedelete/productores_fabricaciones/{fabricacion_id}', [ProductoresFabricacionController::class, 'forcedelete'])->middleware('auth')->name('productores_fabricaciones.forcedelete');
/* PRODUCTORES FABRICACIONES */


/* USUARIO */
Route::view('perfil', 'usuario.perfil')->middleware('auth')->name('usuario.perfil');
Route::view('probadas', 'usuario.probadas')->middleware('auth')->name('usuario.probadas');
Route::view('puntuadas', 'usuario.puntuadas')->middleware('auth')->name('usuario.puntuadas');
/* USUARIO */
