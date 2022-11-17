<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalidadController extends Controller
{
    public function index()
    {
        return view('localidades.index');
    }

    public function create()
    {
        return view('localidades.create');
    }

    public function show($localidad)
    {
        return view('localidades.show', compact('localidad'));
    }
}
