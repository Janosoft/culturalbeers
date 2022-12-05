<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Http\Requests\StorePersona;
use App\Models\Localidad;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::orderBy('nombre')->paginate();
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        $localidades = Localidad::pluck('nombre', 'localidad_id');
        return view('personas.create', compact('localidades'));
    }

    public function store(StorePersona $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $persona = Persona::create($request->all());
        return redirect()->route('personas.show', $persona);
    }

    public function show(Persona $persona)
    {
        return view('personas.show', compact('persona'));
    }

    public function edit(Persona $persona)
    {
        $localidades = Localidad::pluck('nombre', 'localidad_id');
        return view('personas.edit', compact(['persona', 'localidades']));
    }

    public function update(StorePersona $request, Persona $persona)
    {
        $request['slug'] = str()->slug($request->nombre);
        $persona->update($request->all());
        return redirect()->route('personas.show', $persona);
    }

    public function destroy(Persona $persona)
    {
        $persona->delete();
        return redirect()->route('personas.index');
    }
}
