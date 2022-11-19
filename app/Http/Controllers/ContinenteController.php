<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Continente;

class ContinenteController extends Controller
{
    public function index()
    {
        $continentes= Continente::paginate();
        return view('continentes.index', compact('continentes'));
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
