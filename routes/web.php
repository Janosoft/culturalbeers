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
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::view('perfil', 'usuarios.perfil')->name('usuario.perfil');

/* CERVEZAS */
Route::get('cervezas', [CervezaController::class, 'index'])->name('cervezas.index');
Route::post('cervezas', [CervezaController::class, 'store'])->name('cervezas.store');
Route::get('cervezas/create', [CervezaController::class, 'create'])->name('cervezas.create');
Route::get('cervezas/{cerveza}', [CervezaController::class, 'show'])->name('cervezas.show');
Route::match(['put', 'patch'],'cervezas/{cerveza}', [CervezaController::class, 'update'])->name('cervezas.update');
Route::delete('cervezas/{cerveza}', [CervezaController::class, 'destroy'])->name('cervezas.destroy');
Route::get('cervezas/{cerveza}/edit', [CervezaController::class, 'edit'])->name('cervezas.edit');
Route::get('restore/cervezas/{cerveza_id}', [CervezaController::class, 'restore'])->name('cervezas.restore');
Route::get('forcedelete/cervezas/{cerveza_id}', [CervezaController::class, 'forcedelete'])->name('cervezas.forcedelete');
Route::post('comment/cervezas/{cerveza}', [CervezaController::class, 'comment'])->name('cervezas.comment');
/* CERVEZAS */

/* CERVEZAS COLORES */
Route::get('cervezas_colores', [CervezasColorController::class, 'index'])->name('cervezas_colores.index');
Route::post('cervezas_colores', [CervezasColorController::class, 'store'])->name('cervezas_colores.store');
Route::get('cervezas_colores/create', [CervezasColorController::class, 'create'])->name('cervezas_colores.create');
Route::get('cervezas_colores/{cervezas_color}', [CervezasColorController::class, 'show'])->name('cervezas_colores.show');
Route::match(['put', 'patch'],'cervezas_colores/{cervezas_color}', [CervezasColorController::class, 'update'])->name('cervezas_colores.update');
Route::delete('cervezas_colores/{cervezas_color}', [CervezasColorController::class, 'destroy'])->name('cervezas_colores.destroy');
Route::get('cervezas_colores/{cervezas_color}/edit', [CervezasColorController::class, 'edit'])->name('cervezas_colores.edit');
Route::get('restore/cervezas_colores/{color_id}', [CervezasColorController::class, 'restore'])->name('cervezas_colores.restore');
Route::get('forcedelete/cervezas_colores/{color_id}', [CervezasColorController::class, 'forcedelete'])->name('cervezas_colores.forcedelete');
/* CERVEZAS COLORES */

/* CERVEZAS ENVASES TIPOS */
Route::get('cervezas_envases_tipos', [CervezasEnvaseTipoController::class, 'index'])->name('cervezas_envases_tipos.index');
Route::post('cervezas_envases_tipos', [CervezasEnvaseTipoController::class, 'store'])->name('cervezas_envases_tipos.store');
Route::get('cervezas_envases_tipos/create', [CervezasEnvaseTipoController::class, 'create'])->name('cervezas_envases_tipos.create');
Route::get('cervezas_envases_tipos/{cervezas_envases_tipo}', [CervezasEnvaseTipoController::class, 'show'])->name('cervezas_envases_tipos.show');
Route::match(['put', 'patch'],'cervezas_envases_tipos/{cervezas_envases_tipo}', [CervezasEnvaseTipoController::class, 'update'])->name('cervezas_envases_tipos.update');
Route::delete('cervezas_envases_tipos/{cervezas_envases_tipo}', [CervezasEnvaseTipoController::class, 'destroy'])->name('cervezas_envases_tipos.destroy');
Route::get('cervezas_envases_tipos/{cervezas_envases_tipo}/edit', [CervezasEnvaseTipoController::class, 'edit'])->name('cervezas_envases_tipos.edit');
Route::get('restore/cervezas_envases_tipos/{envase_id}', [CervezasEnvaseTipoController::class, 'restore'])->name('cervezas_envases_tipos.restore');
Route::get('forcedelete/cervezas_envases_tipos/{envase_id}', [CervezasEnvaseTipoController::class, 'forcedelete'])->name('cervezas_envases_tipos.forcedelete');
/* CERVEZAS ENVASES TIPOS */

/* CERVEZAS ESTILOS */
Route::get('cervezas_estilos', [CervezasEstiloController::class, 'index'])->name('cervezas_estilos.index');
Route::post('cervezas_estilos', [CervezasEstiloController::class, 'store'])->name('cervezas_estilos.store');
Route::get('cervezas_estilos/create', [CervezasEstiloController::class, 'create'])->name('cervezas_estilos.create');
Route::get('cervezas_estilos/{cervezas_estilo}', [CervezasEstiloController::class, 'show'])->name('cervezas_estilos.show');
Route::match(['put', 'patch'],'cervezas_estilos/{cervezas_estilo}', [CervezasEstiloController::class, 'update'])->name('cervezas_estilos.update');
Route::delete('cervezas_estilos/{cervezas_estilo}', [CervezasEstiloController::class, 'destroy'])->name('cervezas_estilos.destroy');
Route::get('cervezas_estilos/{cervezas_estilo}/edit', [CervezasEstiloController::class, 'edit'])->name('cervezas_estilos.edit');
Route::get('restore/cervezas_estilos/{estilo_id}', [CervezasEstiloController::class, 'restore'])->name('cervezas_estilos.restore');
Route::get('forcedelete/cervezas_estilos/{estilo_id}', [CervezasEstiloController::class, 'forcedelete'])->name('cervezas_estilos.forcedelete');
Route::post('comment/cervezas_estilos/{cervezas_estilo}', [CervezasEstiloController::class, 'comment'])->name('cervezas_estilos.comment');
/* CERVEZAS ESTILOS */

/* CERVEZAS FAMILIAS */
Route::get('cervezas_familias', [CervezasFamiliaController::class, 'index'])->name('cervezas_familias.index');
Route::post('cervezas_familias', [CervezasFamiliaController::class, 'store'])->name('cervezas_familias.store');
Route::get('cervezas_familias/create', [CervezasFamiliaController::class, 'create'])->name('cervezas_familias.create');
Route::get('cervezas_familias/{cervezas_familia}', [CervezasFamiliaController::class, 'show'])->name('cervezas_familias.show');
Route::match(['put', 'patch'],'cervezas_familias/{cervezas_familia}', [CervezasFamiliaController::class, 'update'])->name('cervezas_familias.update');
Route::delete('cervezas_familias/{cervezas_familia}', [CervezasFamiliaController::class, 'destroy'])->name('cervezas_familias.destroy');
Route::get('cervezas_familias/{cervezas_familia}/edit', [CervezasFamiliaController::class, 'edit'])->name('cervezas_familias.edit');
Route::get('restore/cervezas_familias/{familia_id}', [CervezasFamiliaController::class, 'restore'])->name('cervezas_familias.restore');
Route::get('forcedelete/cervezas_familias/{familia_id}', [CervezasFamiliaController::class, 'forcedelete'])->name('cervezas_familias.forcedelete');
Route::post('comment/cervezas_familias/{cervezas_familia}', [CervezasFamiliaController::class, 'comment'])->name('cervezas_familias.comment');
/* CERVEZAS FAMILIAS */

/* CERVEZAS FERMENTOS */
Route::get('cervezas_fermentos', [CervezasFermentoController::class, 'index'])->name('cervezas_fermentos.index');
Route::post('cervezas_fermentos', [CervezasFermentoController::class, 'store'])->name('cervezas_fermentos.store');
Route::get('cervezas_fermentos/create', [CervezasFermentoController::class, 'create'])->name('cervezas_fermentos.create');
Route::get('cervezas_fermentos/{cervezas_fermento}', [CervezasFermentoController::class, 'show'])->name('cervezas_fermentos.show');
Route::match(['put', 'patch'],'cervezas_fermentos/{cervezas_fermento}', [CervezasFermentoController::class, 'update'])->name('cervezas_fermentos.update');
Route::delete('cervezas_fermentos/{cervezas_fermento}', [CervezasFermentoController::class, 'destroy'])->name('cervezas_fermentos.destroy');
Route::get('cervezas_fermentos/{cervezas_fermento}/edit', [CervezasFermentoController::class, 'edit'])->name('cervezas_fermentos.edit');
Route::get('restore/cervezas_fermentos/{fermento_id}', [CervezasFermentoController::class, 'restore'])->name('cervezas_fermentos.restore');
Route::get('forcedelete/cervezas_fermentos/{fermento_id}', [CervezasFermentoController::class, 'forcedelete'])->name('cervezas_fermentos.forcedelete');
Route::post('comment/cervezas_fermentos/{cervezas_fermento}', [CervezasFermentoController::class, 'comment'])->name('cervezas_fermentos.comment');
/* CERVEZAS FERMENTOS */

/* COMENTARIOS */
Route::get('comentarios', [ComentarioController::class, 'index'])->name('comentarios.index');
Route::delete('comentarios/{comentario}', [ComentarioController::class, 'destroy'])->name('comentarios.destroy');
Route::get('offensive/comentarios/{comentario}', [ComentarioController::class, 'offensive'])->name('comentarios.offensive');
Route::get('authorized/comentarios/{comentario}', [ComentarioController::class, 'authorized'])->name('comentarios.authorized');
/* COMENTARIOS */

/* CONTINENTES */
Route::get('continentes', [ContinenteController::class, 'index'])->name('continentes.index');
Route::post('continentes', [ContinenteController::class, 'store'])->name('continentes.store');
Route::get('continentes/create', [ContinenteController::class, 'create'])->name('continentes.create');
Route::get('continentes/{continente}', [ContinenteController::class, 'show'])->name('continentes.show');
Route::match(['put', 'patch'],'continentes/{continente}', [ContinenteController::class, 'update'])->name('continentes.update');
Route::delete('continentes/{continente}', [ContinenteController::class, 'destroy'])->name('continentes.destroy');
Route::get('continentes/{continente}/edit', [ContinenteController::class, 'edit'])->name('continentes.edit');
Route::get('restore/continentes/{continente_id}', [ContinenteController::class, 'restore'])->name('continentes.restore');
Route::get('forcedelete/continentes/{continente_id}', [ContinenteController::class, 'forcedelete'])->name('continentes.forcedelete');
/* CONTINENTES */

/* DIVISIONES POLITICAS */
Route::get('divisiones_politicas', [DivisionPoliticaController::class, 'index'])->name('divisiones_politicas.index');
Route::post('divisiones_politicas', [DivisionPoliticaController::class, 'store'])->name('divisiones_politicas.store');
Route::get('divisiones_politicas/create', [DivisionPoliticaController::class, 'create'])->name('divisiones_politicas.create');
Route::get('divisiones_politicas/{division_politica}', [DivisionPoliticaController::class, 'show'])->name('divisiones_politicas.show');
Route::match(['put', 'patch'],'divisiones_politicas/{division_politica}', [DivisionPoliticaController::class, 'update'])->name('divisiones_politicas.update');
Route::delete('divisiones_politicas/{division_politica}', [DivisionPoliticaController::class, 'destroy'])->name('divisiones_politicas.destroy');
Route::get('divisiones_politicas/{division_politica}/edit', [DivisionPoliticaController::class, 'edit'])->name('divisiones_politicas.edit');
Route::get('restore/divisiones_politicas/{division_politica_id}', [DivisionPoliticaController::class, 'restore'])->name('divisiones_politicas.restore');
Route::get('forcedelete/divisiones_politicas/{division_politica_id}', [DivisionPoliticaController::class, 'forcedelete'])->name('divisiones_politicas.forcedelete');
/* DIVISIONES POLITICAS */

/* DIVISIONES POLITICAS TIPOS*/
Route::get('divisiones_politicas_tipos', [DivisionesPoliticasTipoController::class, 'index'])->name('divisiones_politicas_tipos.index');
Route::post('divisiones_politicas_tipos', [DivisionesPoliticasTipoController::class, 'store'])->name('divisiones_politicas_tipos.store');
Route::get('divisiones_politicas_tipos/create', [DivisionesPoliticasTipoController::class, 'create'])->name('divisiones_politicas_tipos.create');
Route::get('divisiones_politicas_tipos/{divisiones_politicas_tipo}', [DivisionesPoliticasTipoController::class, 'show'])->name('divisiones_politicas_tipos.show');
Route::match(['put', 'patch'],'divisiones_politicas_tipos/{divisiones_politicas_tipo}', [DivisionesPoliticasTipoController::class, 'update'])->name('divisiones_politicas_tipos.update');
Route::delete('divisiones_politicas_tipos/{divisiones_politicas_tipo}', [DivisionesPoliticasTipoController::class, 'destroy'])->name('divisiones_politicas_tipos.destroy');
Route::get('divisiones_politicas_tipos/{divisiones_politicas_tipo}/edit', [DivisionesPoliticasTipoController::class, 'edit'])->name('divisiones_politicas_tipos.edit');
Route::get('restore/divisiones_politicas_tipos/{division_politica_tipo_id}', [DivisionesPoliticasTipoController::class, 'restore'])->name('divisiones_politicas_tipos.restore');
Route::get('forcedelete/divisiones_politicas_tipos/{division_politica_tipo_id}', [DivisionesPoliticasTipoController::class, 'forcedelete'])->name('divisiones_politicas_tipos.forcedelete');
/* DIVISIONES POLITICAS TIPOS*/

/* IMAGENES */
Route::get('imagenes/{imagen}', [ImagenController::class, 'show'])->name('imagenes.show');
/* IMAGENES */

/* LOCALIDADES */
Route::get('localidades', [LocalidadController::class, 'index'])->name('localidades.index');
Route::post('localidades', [LocalidadController::class, 'store'])->name('localidades.store');
Route::get('localidades/create', [LocalidadController::class, 'create'])->name('localidades.create');
Route::get('localidades/{localidad}', [LocalidadController::class, 'show'])->name('localidades.show');
Route::match(['put', 'patch'],'localidades/{localidad}', [LocalidadController::class, 'update'])->name('localidades.update');
Route::delete('localidades/{localidad}', [LocalidadController::class, 'destroy'])->name('localidades.destroy');
Route::get('localidades/{localidad}/edit', [LocalidadController::class, 'edit'])->name('localidades.edit');
Route::get('restore/localidades/{localidad_id}', [LocalidadController::class, 'restore'])->name('localidades.restore');
Route::get('forcedelete/localidades/{localidad_id}', [LocalidadController::class, 'forcedelete'])->name('localidades.forcedelete');
Route::post('comment/localidades/{localidad}', [LocalidadController::class, 'comment'])->name('localidades.comment');
/* LOCALIDADES */

/* LUGARES */
Route::get('lugares', [LugarController::class, 'index'])->name('lugares.index');
Route::post('lugares', [LugarController::class, 'store'])->name('lugares.store');
Route::get('lugares/create', [LugarController::class, 'create'])->name('lugares.create');
Route::get('lugares/{lugar}', [LugarController::class, 'show'])->name('lugares.show');
Route::match(['put', 'patch'],'lugares/{lugar}', [LugarController::class, 'update'])->name('lugares.update');
Route::delete('lugares/{lugar}', [LugarController::class, 'destroy'])->name('lugares.destroy');
Route::get('lugares/{lugar}/edit', [LugarController::class, 'edit'])->name('lugares.edit');
Route::get('restore/lugares/{lugar_id}', [LugarController::class, 'restore'])->name('lugares.restore');
Route::get('forcedelete/lugares/{lugar_id}', [LugarController::class, 'forcedelete'])->name('lugares.forcedelete');
Route::get('verify/lugares/{lugar}', [LugarController::class, 'verify'])->name('lugares.verify');
Route::post('comment/lugares/{lugar}', [LugarController::class, 'comment'])->name('lugares.comment');
/* LUGARES */

/* LUGARES CATEGORIAS */
Route::get('lugares_categorias', [LugaresCategoriaController::class, 'index'])->name('lugares_categorias.index');
Route::post('lugares_categorias', [LugaresCategoriaController::class, 'store'])->name('lugares_categorias.store');
Route::get('lugares_categorias/create', [LugaresCategoriaController::class, 'create'])->name('lugares_categorias.create');
Route::get('lugares_categorias/{lugares_categoria}', [LugaresCategoriaController::class, 'show'])->name('lugares_categorias.show');
Route::match(['put', 'patch'],'lugares/{lugares_categoria}', [LugaresCategoriaController::class, 'update'])->name('lugares_categorias.update');
Route::delete('lugares_categorias/{lugares_categoria}', [LugaresCategoriaController::class, 'destroy'])->name('lugares_categorias.destroy');
Route::get('lugares_categorias/{lugares_categoria}/edit', [LugaresCategoriaController::class, 'edit'])->name('lugares_categorias.edit');
Route::get('restore/lugares_categorias/{categoria_id}', [LugaresCategoriaController::class, 'restore'])->name('lugares_categorias.restore');
Route::get('forcedelete/lugares_categorias/{categoria_id}', [LugaresCategoriaController::class, 'forcedelete'])->name('lugares_categorias.forcedelete');
/* LUGARES CATEGORIAS */

/* PAISES */
Route::get('paises', [PaisController::class, 'index'])->name('paises.index');
Route::post('paises', [PaisController::class, 'store'])->name('paises.store');
Route::get('paises/create', [PaisController::class, 'create'])->name('paises.create');
Route::get('paises/{pais}', [PaisController::class, 'show'])->name('paises.show');
Route::match(['put', 'patch'],'paises/{pais}', [PaisController::class, 'update'])->name('paises.update');
Route::delete('paises/{pais}', [PaisController::class, 'destroy'])->name('paises.destroy');
Route::get('paises/{pais}/edit', [PaisController::class, 'edit'])->name('paises.edit');
Route::get('restore/paises/{pais_id}', [PaisController::class, 'restore'])->name('paises.restore');
Route::get('forcedelete/paises/{pais_id}', [PaisController::class, 'forcedelete'])->name('paises.forcedelete');
/* PAISES */

/* PRODUCTORES */
Route::get('productores', [ProductorController::class, 'index'])->name('productores.index');
Route::post('productores', [ProductorController::class, 'store'])->name('productores.store');
Route::get('productores/create', [ProductorController::class, 'create'])->name('productores.create');
Route::get('productores/{productor}', [ProductorController::class, 'show'])->name('productores.show');
Route::match(['put', 'patch'],'productores/{productor}', [ProductorController::class, 'update'])->name('productores.update');
Route::delete('productores/{productor}', [ProductorController::class, 'destroy'])->name('productores.destroy');
Route::get('productores/{productor}/edit', [ProductorController::class, 'edit'])->name('productores.edit');
Route::get('restore/productores/{productor_id}', [ProductorController::class, 'restore'])->name('productores.restore');
Route::get('forcedelete/productores/{productor_id}', [ProductorController::class, 'forcedelete'])->name('productores.forcedelete');
Route::get('verify/productores/{productor}', [ProductorController::class, 'verify'])->name('productores.verify');
/* PRODUCTORES */

/* PRODUCTORES FABRICACIONES */
Route::get('productores_fabricaciones', [ProductoresFabricacionController::class, 'index'])->name('productores_fabricaciones.index');
Route::post('productores_fabricaciones', [ProductoresFabricacionController::class, 'store'])->name('productores_fabricaciones.store');
Route::get('productores_fabricaciones/create', [ProductoresFabricacionController::class, 'create'])->name('productores_fabricaciones.create');
Route::get('productores_fabricaciones/{productor}', [ProductoresFabricacionController::class, 'show'])->name('productores_fabricaciones.show');
Route::match(['put', 'patch'],'productores_fabricaciones/{productor}', [ProductoresFabricacionController::class, 'update'])->name('productores_fabricaciones.update');
Route::delete('productores_fabricaciones/{productor}', [ProductoresFabricacionController::class, 'destroy'])->name('productores_fabricaciones.destroy');
Route::get('productores_fabricaciones/{productor}/edit', [ProductoresFabricacionController::class, 'edit'])->name('productores_fabricaciones.edit');
Route::get('restore/productores_fabricaciones/{fabricacion_id}', [ProductoresFabricacionController::class, 'restore'])->name('productores_fabricaciones.restore');
Route::get('forcedelete/productores_fabricaciones/{fabricacion_id}', [ProductoresFabricacionController::class, 'forcedelete'])->name('productores_fabricaciones.forcedelete');
/* PRODUCTORES FABRICACIONES */



