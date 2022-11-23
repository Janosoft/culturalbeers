<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function store(Request $request)
    {
        $productores_fabricacion = new ProductoresFabricacion();
        $productores_fabricacion->nombre = $request->nombre;
        $productores_fabricacion->save();
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

    public function update(Request $request, ProductoresFabricacion $productores_fabricacion)
    {
        $productores_fabricacion->nombre = $request->nombre;
        $productores_fabricacion->save();
        return redirect()->route('productores_fabricaciones.show', $productores_fabricacion);
    }
}
