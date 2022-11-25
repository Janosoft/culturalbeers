<?php

namespace App\Http\Controllers;

use App\Models\ProductoresFabricacion;
use App\Http\Requests\StoreProductorFabricacion;

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
        $productores_fabricacion = ProductoresFabricacion::create($request->all());
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
        $productores_fabricacion->update($request->all());
        return redirect()->route('productores_fabricaciones.show', $productores_fabricacion);
    }
    
    public function destroy(ProductoresFabricacion $productores_fabricacion)
    {
        $productores_fabricacion->delete();
        return redirect()->route('productores_fabricaciones.index');
    }
}
