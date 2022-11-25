<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Http\Requests\StorePais;

class PaisController extends Controller
{
    public function index()
    {
        $paises = Pais::orderBy('nombre')->paginate();
        return view('paises.index', compact('paises'));
    }

    public function create()
    {
        return view('paises.create');
    }

    public function store(StorePais $request)
    {
        $pais = Pais::create($request->all());
        return redirect()->route('paises.show', $pais);
    }

    public function show(Pais $pais)
    {
        return view('paises.show', compact('pais'));
    }

    public function edit(Pais $pais)
    {
        return view('paises.edit', compact('pais'));
    }

    public function update(StorePais $request, Pais $pais)
    {
        $pais->update($request->all());
        return redirect()->route('paises.show', $pais);
    }
    
    public function destroy(Pais $pais)
    {
        $pais->delete();
        return redirect()->route('paises.index');
    }
}
