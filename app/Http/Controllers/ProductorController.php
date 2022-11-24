<?php

namespace App\Http\Controllers;

use App\Models\Productor;
use App\Http\Requests\StoreProductor;

class ProductorController extends Controller
{
    public function index()
    {
        $productores = Productor::orderBy('nombre')->paginate();
        return view('productores.index', compact('productores'));
    }

    public function create()
    {
        return view('productores.create');
    }

    public function store(StoreProductor $request)
    {
        $productor = new Productor();
        $productor->nombre = $request->nombre;
        $productor->save();
        return redirect()->route('productores.show', $productor);
    }

    public function show(Productor $productor)
    {
        return view('productores.show', compact('productor'));
    }

    public function edit(Productor $productor)
    {
        return view('productores.edit', compact('productor'));
    }

    public function update(StoreProductor $request, Productor $productor)
    {
        $productor->nombre = $request->nombre;
        $productor->save();
        return redirect()->route('productores.show', $productor);
    }
}
