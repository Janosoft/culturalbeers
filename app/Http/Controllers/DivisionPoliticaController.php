<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DivisionPoliticaController extends Controller
{
    public function index()
    {
        return view('divisiones_politicas.index');
    }

    public function create()
    {
        return view('divisiones_politicas.create');
    }

    public function show($division_politica)
    {
        return view('divisiones_politicas.show', compact('division_politica'));
    }
}
