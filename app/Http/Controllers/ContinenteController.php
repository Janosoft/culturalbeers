<?php

namespace App\Http\Controllers;

use App\Models\Continente;
use App\Http\Requests\StoreContinente;

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

    public function store(StoreContinente $request)
    {
        $continente = Continente::create($request->all());
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

    public function update(StoreContinente $request, Continente $continente)
    {
        $continente->update($request->all());
        return redirect()->route('continentes.show', $continente);
    }
}
