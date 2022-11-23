<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Continente;

class ContinenteController extends Controller
{
    public function index()
    {
        $continentes = Continente::orderBy('nombre')->paginate();
        return view('continentes.index', compact('continentes'));
    }

    public function create()
    {
        return view('continentes.create');
    }

    public function store(Request $request)
    {
        $continente = new Continente();
        $continente->nombre = $request->nombre;
        $continente->save();
        return redirect()->route('continentes.show', $continente);
    }

    public function show(Continente $continente)
    {
        return view('continentes.show', compact('continente'));
    }

    public function edit(Continente $continente)
    {
        return view('continentes.edit', compact('continente'));
    }

    public function update(Request $request, Continente $continente)
    {
        $continente->nombre = $request->nombre;
        $continente->save();
        return redirect()->route('continentes.show', $continente);
    }
}
