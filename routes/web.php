<?php

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

Route::get('/', function () {
    return view('inicio');
});

Route::get('continentes', function () {
    return view('continentes');
});

Route::get('paises', function () {
    return view('paises');
});

Route::get('divisiones_politicas', function () {
    return view('divisiones_politicas');
});

Route::get('divisiones_politicas_tipo', function () {
    return view('divisiones_politicas_tipo');
});

Route::get('ciudades', function () {
    return view('ciudades');
});

Route::get('personas', function () {
    return view('personas');
});

Route::get('usuarios', function () {
    return view('usuarios');
});
