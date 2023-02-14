<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductorFabricacion;
use App\Models\ProductoresFabricacion;

class ProductoresFabricacionController extends Controller
{
    public function index()
    {
        $productores_fabricaciones = ProductoresFabricacion::orderBy('nombre')->paginate();

        return view('productores_fabricaciones.index', compact('productores_fabricaciones'));
    }

    public function create()
    {
        return view('productores_fabricaciones.create');
    }

    public function store(StoreProductorFabricacion $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $productores_fabricacion = ProductoresFabricacion::create($request->all());
        session()->flash('statusTitle', 'Fabricación Creada');
        session()->flash('statusMessage', 'El tipo de fabricación fue creado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('productores_fabricaciones.show', $productores_fabricacion);
    }

    public function show(ProductoresFabricacion $productores_fabricacion)
    {
        return view('productores_fabricaciones.show', compact('productores_fabricacion'));
    }

    public function edit(ProductoresFabricacion $productores_fabricacion)
    {
        return view('productores_fabricaciones.edit', compact('productores_fabricacion'));
    }

    public function update(StoreProductorFabricacion $request, ProductoresFabricacion $productores_fabricacion)
    {
        $request['slug'] = str()->slug($request->nombre);
        $productores_fabricacion->update($request->all());
        session()->flash('statusTitle', 'Fabricación Actualizada');
        session()->flash('statusMessage', 'El tipo de fabricación fue actualizado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('productores_fabricaciones.show', $productores_fabricacion);
    }

    public function destroy(ProductoresFabricacion $productores_fabricacion)
    {
        $productores_fabricacion->delete();
        session()->flash('statusTitle', 'Fabricación Eliminada');
        session()->flash('statusMessage', 'El tipo de fabricación fue eliminado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('productores_fabricaciones.index');
    }
}
