<?php

namespace App\Http\Controllers;

use App\Models\Productor;
use App\Http\Requests\StoreProductor;
use App\Models\ProductoresFabricacion;
use App\Models\Localidad;

class ProductorController extends Controller
{
    public function index()
    {
        $productores = Productor::orderBy('nombre')->paginate();
        return view('productores.index', compact('productores'));
    }

    public function create()
    {
        $fabricaciones = ProductoresFabricacion::pluck('nombre', 'fabricacion_id');
        $localidades = Localidad::pluck('nombre', 'localidad_id');
        return view('productores.create', compact(['fabricaciones', 'localidades']));
    }

    public function store(StoreProductor $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $productor = Productor::create($request->all());
        return redirect()->route('productores.show', $productor);
    }

    public function show(Productor $productor)
    {
        return view('productores.show', compact('productor'));
    }

    public function edit(Productor $productor)
    {
        $fabricaciones = ProductoresFabricacion::pluck('nombre', 'fabricacion_id');
        $localidades = Localidad::pluck('nombre', 'localidad_id');
        return view('productores.edit', compact(['productor', 'fabricaciones', 'localidades']));
    }

    public function update(StoreProductor $request, Productor $productor)
    {
        $request['slug'] = str()->slug($request->nombre);
        $productor->update($request->all());
        return redirect()->route('productores.show', $productor);
    }

    public function destroy(Productor $productor)
    {
        $productor->delete();
        return redirect()->route('productores.index');
    }
}
