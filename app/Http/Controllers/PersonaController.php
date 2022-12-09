<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Http\Requests\StorePersona;
use App\Models\Imagen;
use App\Models\Localidad;
use Illuminate\Support\Facades\Storage;

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
        foreach ($persona->imagenes as $imagen)
         {
            if(Storage::exists($imagen->url)) Storage::delete($imagen->url);
            $imagen->delete();
         }
        $persona->delete();
        return redirect()->route('personas.index');
    }
}
