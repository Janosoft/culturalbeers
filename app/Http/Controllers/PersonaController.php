<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersona;
use App\Models\Imagen;
use App\Models\Localidad;
use App\Models\Persona;

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
        if ($request->imagen) {
            $fileName = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('storage/imagenes'), $fileName);
            Imagen::create([
                'imageable_id' => $persona->persona_id,
                'url' => 'imagenes/' . $fileName,
                'imageable_type' => Persona::class,
            ]);
        }
        session()->flash('statusTitle', 'Persona Creada');
        session()->flash('statusMessage', 'La persona fue creada correctamente.');
        session()->flash('statusColor', 'success');

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
        session()->flash('statusTitle', 'Persona Actualizada');
        session()->flash('statusMessage', 'La persona fue actualizada correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('personas.show', $persona);
    }

    public function destroy(Persona $persona)
    {
        $persona->delete();
        session()->flash('statusTitle', 'Persona Eliminada');
        session()->flash('statusMessage', 'La persona fue eliminada correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('personas.index');
    }
}
