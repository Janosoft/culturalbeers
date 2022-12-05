<?php

namespace App\Http\Controllers;

use App\Models\Localidad;
use App\Http\Requests\StoreLocalidad;
use App\Models\DivisionPolitica;

class LocalidadController extends Controller
{
    public function index()
    {
        $localidades = Localidad::orderBy('nombre')->paginate();
        return view('localidades.index', compact('localidades'));
    }

    public function create()
    {
        $divisiones_politicas = DivisionPolitica::pluck('nombre', 'division_politica_id');
        return view('localidades.create', compact('divisiones_politicas'));
    }

    public function store(StoreLocalidad $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $localidad = Localidad::create($request->all());
        return redirect()->route('localidades.show', $localidad);
    }

    public function show(Localidad $localidad)
    {
        return view('localidades.show', compact('localidad'));
    }

    public function edit(Localidad $localidad)
    {
        $divisiones_politicas = DivisionPolitica::pluck('nombre', 'division_politica_id');
        return view('localidades.edit', compact(['localidad', 'divisiones_politicas']));
    }

    public function update(StoreLocalidad $request, Localidad $localidad)
    {
        $request['slug'] = str()->slug($request->nombre);
        $localidad->update($request->all());
        return redirect()->route('localidades.show', $localidad);
    }

    public function destroy(Localidad $localidad)
    {
        $localidad->delete();
        return redirect()->route('localidades.index');
    }
}
