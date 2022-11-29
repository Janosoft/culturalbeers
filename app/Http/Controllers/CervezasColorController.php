<?php

namespace App\Http\Controllers;

use App\Models\CervezasColor;
use App\Http\Requests\StoreCervezaColor;

class CervezasColorController extends Controller
{
    public function index()
    {
        $cervezas_colores = CervezasColor::orderBy('nombre')->paginate();
        return view('cervezas_colores.index', compact('cervezas_colores'));
    }

    public function create()
    {
        return view('cervezas_colores.create');
    }

    public function store(StoreCervezaColor $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $cervezas_color = CervezasColor::create($request->all());
        return redirect()->route('cervezas_colores.show', $cervezas_color);
    }

    public function show(CervezasColor $cervezas_color)
    {
        return view('cervezas_colores.show', compact('cervezas_color'));
    }

    public function edit(CervezasColor $cervezas_color)
    {
        return view('cervezas_colores.edit', compact('cervezas_color'));
    }

    public function update(StoreCervezaColor $request, CervezasColor $cervezas_color)
    {
        $request['slug'] = str()->slug($request->nombre);
        $cervezas_color->update($request->all());
        return redirect()->route('cervezas_colores.show', $cervezas_color);
    }

    public function destroy(CervezasColor $cervezas_color)
    {
        $cervezas_color->delete();
        return redirect()->route('cervezas_colores.index');
    }
}
