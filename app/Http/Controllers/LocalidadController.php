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
        $localidad = new Localidad();
        $localidad->nombre = $request->nombre;
        $localidad->save();
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
        $localidad->nombre = $request->nombre;
        $localidad->save();
        return redirect()->route('localidades.show', $localidad);
    }
}
