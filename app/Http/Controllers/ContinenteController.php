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
        $request['slug'] = str()->slug($request->nombre);
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
        $request['slug'] = str()->slug($request->nombre);
        $continente->update($request->all());
        session()->flash('statusTitle', 'Continente Actualizado');
        session()->flash('statusMessage', 'El continente fue actualizado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('continentes.show', $continente);
    }
    
    public function destroy(Continente $continente)
    {
        $continente->delete();
        session()->flash('statusTitle', 'Continente Eliminado');
        session()->flash('statusMessage', 'El continente fue eliminado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('continentes.index');
    }
}
