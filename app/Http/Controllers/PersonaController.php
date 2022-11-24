<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Http\Requests\StorePersona;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::orderBy('nombre')->paginate();
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        return view('personas.create');
    }

    public function store(StorePersona $request)
    {
        $persona = new Persona();
        $persona->nombre = $request->nombre;
        $persona->save();
        return redirect()->route('personas.show', $persona);
    }

    public function show(Persona $persona)
    {
        return view('personas.show', compact('persona'));
    }

    public function edit(Persona $persona)
    {
        return view('personas.edit', compact('persona'));
    }

    public function update(StorePersona $request, Persona $persona)
    {
        $persona->nombre = $request->nombre;
        $persona->save();
        return redirect()->route('personas.show', $persona);
    }
}
