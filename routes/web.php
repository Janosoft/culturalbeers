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
Route::get('perfil', [UsuarioController::class, 'perfil'])->middleware(['auth'])->name('usuario.perfil');

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
Route::resource('lugares', LugarController::class);
Route::resource('lugares_categorias', LugaresCategoriaController::class);
Route::resource('paises', PaisController::class);
Route::resource('productores', ProductorController::class);
Route::resource('productores_fabricaciones', ProductoresFabricacionController::class)->parameters(['productores_fabricaciones' => 'productores_fabricacion']);

/* USUARIOS */
//Route::get('account', [UsuarioController::class, 'account'])->name('account');
/* USUARIOS */

/* RESTORE SOFTDELETE */
Route::get('restore/cervezas/{cerveza_id}', [CervezaController::class, 'restore'])->name('cervezas.restore');
Route::get('restore/cervezas_colores/{color_id}', [CervezasColorController::class, 'restore'])->name('cervezas_colores.restore');
Route::get('restore/cervezas_envases_tipos/{envase_id}', [CervezasEnvaseTipoController::class, 'restore'])->name('cervezas_envases_tipos.restore');
Route::get('restore/cervezas_estilos/{estilo_id}', [CervezasEstiloController::class, 'restore'])->name('cervezas_estilos.restore');
Route::get('restore/cervezas_familias/{familia_id}', [CervezasFamiliaController::class, 'restore'])->name('cervezas_familias.restore');
Route::get('restore/cervezas_fermentos/{fermento_id}', [CervezasFermentoController::class, 'restore'])->name('cervezas_fermentos.restore');
Route::get('restore/continentes/{continente_id}', [ContinenteController::class, 'restore'])->name('continentes.restore');
Route::get('restore/divisiones_politicas/{division_politica_id}', [DivisionPoliticaController::class, 'restore'])->name('divisiones_politicas.restore');
Route::get('restore/divisiones_politicas_tipos/{division_politica_tipo_id}', [DivisionesPoliticasTipoController::class, 'restore'])->name('divisiones_politicas_tipos.restore');
Route::get('restore/localidades/{localidad_id}', [LocalidadController::class, 'restore'])->name('localidades.restore');
Route::get('restore/lugares/{lugar_id}', [LugarController::class, 'restore'])->name('lugares.restore');
Route::get('restore/lugares_categorias/{categoria_id}', [LugaresCategoriaController::class, 'restore'])->name('lugares_categorias.restore');
Route::get('restore/paises/{pais_id}', [PaisController::class, 'restore'])->name('paises.restore');
Route::get('restore/productores/{productor_id}', [ProductorController::class, 'restore'])->name('productores.restore');
Route::get('restore/productores_fabricaciones/{fabricacion_id}', [ProductoresFabricacionController::class, 'restore'])->name('productores_fabricaciones.restore');
/* RESTORE SOFTDELETE */

/* FORCE DELETE */
Route::get('forcedelete/cervezas/{cerveza_id}', [CervezaController::class, 'forcedelete'])->name('cervezas.forcedelete');
Route::get('forcedelete/cervezas_colores/{color_id}', [CervezasColorController::class, 'forcedelete'])->name('cervezas_colores.forcedelete');
Route::get('forcedelete/cervezas_envases_tipos/{envase_id}', [CervezasEnvaseTipoController::class, 'forcedelete'])->name('cervezas_envases_tipos.forcedelete');
Route::get('forcedelete/cervezas_estilos/{estilo_id}', [CervezasEstiloController::class, 'forcedelete'])->name('cervezas_estilos.forcedelete');
Route::get('forcedelete/cervezas_familias/{familia_id}', [CervezasFamiliaController::class, 'forcedelete'])->name('cervezas_familias.forcedelete');
Route::get('forcedelete/cervezas_fermentos/{fermento_id}', [CervezasFermentoController::class, 'forcedelete'])->name('cervezas_fermentos.forcedelete');
Route::get('forcedelete/continentes/{continente_id}', [ContinenteController::class, 'forcedelete'])->name('continentes.forcedelete');
Route::get('forcedelete/divisiones_politicas/{division_politica_id}', [DivisionPoliticaController::class, 'forcedelete'])->name('divisiones_politicas.forcedelete');
Route::get('forcedelete/divisiones_politicas_tipos/{division_politica_tipo_id}', [DivisionesPoliticasTipoController::class, 'forcedelete'])->name('divisiones_politicas_tipos.forcedelete');
Route::get('forcedelete/localidades/{localidad_id}', [LocalidadController::class, 'forcedelete'])->name('localidades.forcedelete');
Route::get('forcedelete/lugares/{lugar_id}', [LugarController::class, 'forcedelete'])->name('lugares.forcedelete');
Route::get('forcedelete/lugares_categorias/{categoria_id}', [LugaresCategoriaController::class, 'forcedelete'])->name('lugares_categorias.forcedelete');
Route::get('forcedelete/paises/{pais_id}', [PaisController::class, 'forcedelete'])->name('paises.forcedelete');
Route::get('forcedelete/productores/{productor_id}', [ProductorController::class, 'forcedelete'])->name('productores.forcedelete');
Route::get('forcedelete/productores_fabricaciones/{fabricacion_id}', [ProductoresFabricacionController::class, 'forcedelete'])->name('productores_fabricaciones.forcedelete');
/* FORCE DELETE */

/* VERIFICAR */
Route::get('verify/productores/{productor}', [ProductorController::class, 'verify'])->name('productores.verify');
Route::get('verify/lugares/{lugar}', [LugarController::class, 'verify'])->name('lugares.verify');
/* VERIFICAR */

/* IMAGENES */
Route::get('imagenes/{imagen}', [ImagenController::class, 'show'])->name('imagenes.show');
/* IMAGENES */

/* COMENTARIOS */
Route::get('comentarios', [ComentarioController::class, 'index'])->name('comentarios.index');
Route::delete('comentarios/{comentario}', [ComentarioController::class, 'destroy'])->name('comentarios.destroy');
Route::get('offensive/comentarios/{comentario}', [ComentarioController::class, 'offensive'])->name('comentarios.offensive');
Route::get('authorized/comentarios/{comentario}', [ComentarioController::class, 'authorized'])->name('comentarios.authorized');
Route::post('comment/cervezas/{cerveza}', [CervezaController::class, 'comment'])->name('cervezas.comment');
Route::post('comment/cervezas_estilos/{cervezas_estilo}', [CervezasEstiloController::class, 'comment'])->name('cervezas_estilos.comment');
Route::post('comment/cervezas_familias/{cervezas_familia}', [CervezasFamiliaController::class, 'comment'])->name('cervezas_familias.comment');
Route::post('comment/cervezas_fermentos/{cervezas_fermento}', [CervezasFermentoController::class, 'comment'])->name('cervezas_fermentos.comment');
Route::post('comment/localidades/{localidad}', [LocalidadController::class, 'comment'])->name('localidades.comment');
Route::post('comment/lugares/{lugar}', [LugarController::class, 'comment'])->name('lugares.comment');
Route::post('comment/productores/{productor}', [ProductorController::class, 'comment'])->name('productores.comment');
/* COMENTARIOS */
