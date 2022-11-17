<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DivisionPoliticaTipoController extends Controller
{
    public function index()
    {
        return view('divisiones_politicas_tipo.index');
    }

    public function create()
    {
        return view('divisiones_politicas_tipo.create');
    }

    public function show($division_politica_tipo)
    {
        return view('divisiones_politicas_tipo.show', compact('division_politica_tipo'));
    }

}
