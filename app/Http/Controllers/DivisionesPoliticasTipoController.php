<?php

namespace App\Http\Controllers;

use App\Models\DivisionesPoliticasTipo;
use App\Http\Requests\StoreDivisionPoliticaTipo;

class DivisionesPoliticasTipoController extends Controller
{
    public function index()
    {
        $divisiones_politicas_tipos = DivisionesPoliticasTipo::orderBy('nombre')->paginate();
        return view('divisiones_politicas_tipos.index', compact('divisiones_politicas_tipos'));
    }

    public function create()
    {
        return view('divisiones_politicas_tipos.create');
    }

    public function store(StoreDivisionPoliticaTipo $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $divisiones_politicas_tipo = DivisionesPoliticasTipo::create($request->all());
        return redirect()->route('divisiones_politicas_tipos.show', $divisiones_politicas_tipo);
    }

    public function show(DivisionesPoliticasTipo $divisiones_politicas_tipo)
    {
        return view('divisiones_politicas_tipos.show', compact('divisiones_politicas_tipo'));
    }

    public function edit(DivisionesPoliticasTipo $divisiones_politicas_tipo)
    {
        return view('divisiones_politicas_tipos.edit', compact('divisiones_politicas_tipo'));
    }

    public function update(StoreDivisionPoliticaTipo $request, DivisionesPoliticasTipo $divisiones_politicas_tipo)
    {
        $request['slug'] = str()->slug($request->nombre);
        $divisiones_politicas_tipo->update($request->all());
        return redirect()->route('divisiones_politicas_tipos.show', $divisiones_politicas_tipo);
    }
    
    public function destroy(DivisionesPoliticasTipo $divisiones_politicas_tipo)
    {
        $divisiones_politicas_tipo->delete();
        return redirect()->route('divisiones_politicas_tipos.index');
    }
}
