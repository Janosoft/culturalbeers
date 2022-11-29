<?php

namespace App\Http\Controllers;

use App\Models\Localidad;
use App\Http\Requests\StoreLocalidad;

class LocalidadController extends Controller
{
    public function index()
    {
        $localidades = Localidad::orderBy('nombre')->paginate();
        return view('localidades.index', compact('localidades'));
    }

    public function create()
    {
        return view('localidades.create');
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
        return view('localidades.edit', compact('localidad'));
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
