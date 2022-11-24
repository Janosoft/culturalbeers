<?php

namespace App\Http\Controllers;

use App\Models\DivisionesPoliticasTipo;
use App\Http\Requests\StoreDivisionPoliticaTipo;

class DivisionesPoliticasTipoTipoController extends Controller
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
        $division_politica_tipo = new DivisionesPoliticasTipo();
        $division_politica_tipo->nombre = $request->nombre;
        $division_politica_tipo->save();
        return redirect()->route('divisiones_politicas_tipos.show', $division_politica_tipo);
    }

    public function show(DivisionesPoliticasTipo $division_politica_tipo)
    {
        return view('divisiones_politicas_tipos.show', compact('division_politica_tipo'));
    }

    public function edit(DivisionesPoliticasTipo $division_politica_tipo)
    {
        return view('divisiones_politicas_tipos.edit', compact('division_politica_tipo'));
    }

    public function update(StoreDivisionPoliticaTipo $request, DivisionesPoliticasTipo $division_politica_tipo)
    {
        $division_politica_tipo->nombre = $request->nombre;
        $division_politica_tipo->save();
        return redirect()->route('divisiones_politicas_tipos.show', $division_politica_tipo);
    }
}
