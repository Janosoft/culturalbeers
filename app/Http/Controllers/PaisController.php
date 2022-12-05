<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Http\Requests\StorePais;
use App\Models\Continente;
use App\Models\DivisionesPoliticasTipo;

class PaisController extends Controller
{
    public function index()
    {
        $paises = Pais::orderBy('nombre')->paginate();
        return view('paises.index', compact('paises'));
    }

    public function create()
    {
        $continentes = Continente::pluck('nombre', 'continente_id');
        $divisiones_politicas_tipo = DivisionesPoliticasTipo::pluck('nombre', 'divisiones_politicas_tipo_id');
        return view('paises.create', compact(['continentes','divisiones_politicas_tipo']));
    }

    public function store(StorePais $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $pais = Pais::create($request->all());
        return redirect()->route('paises.show', $pais);
    }

    public function show(Pais $pais)
    {
        return view('paises.show', compact('pais'));
    }

    public function edit(Pais $pais)
    {
        $continentes = Continente::pluck('nombre', 'continente_id');
        $divisiones_politicas_tipo = DivisionesPoliticasTipo::pluck('nombre', 'divisiones_politicas_tipo_id');
        return view('paises.edit', compact(['pais','continentes','divisiones_politicas_tipo']));
    }

    public function update(StorePais $request, Pais $pais)
    {
        $request['slug'] = str()->slug($request->nombre);
        $pais->update($request->all());
        return redirect()->route('paises.show', $pais);
    }
    
    public function destroy(Pais $pais)
    {
        $pais->delete();
        return redirect()->route('paises.index');
    }
}
