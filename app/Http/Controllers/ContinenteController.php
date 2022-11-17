<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContinenteController extends Controller
{
    public function index()
    {
        return view('continentes.index');
    }

    public function create()
    {
        return view('continentes.create');
    }

    public function show($continente)
    {
        return view('continentes.show', compact('continente'));
    }
}
