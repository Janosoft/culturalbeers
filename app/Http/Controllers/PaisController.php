<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function index()
    {
        return view('paises.index');
    }

    public function create()
    {
        return view('paises.create');
    }

    public function show($pais)
    {
        return view('paises.show', compact('pais'));
    }
}
