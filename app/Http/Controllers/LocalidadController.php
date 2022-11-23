<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Localidad;

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

    public function store(Request $request)
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

    public function update(Request $request, Localidad $localidad)
    {
        $localidad->nombre = $request->nombre;
        $localidad->save();
        return redirect()->route('localidades.show', $localidad);
    }
}
