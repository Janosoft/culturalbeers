<?php

namespace App\Http\Controllers;

use App\Models\CervezasFamilia;
use App\Models\CervezasFermento;
use App\Http\Requests\StoreCervezaFamilia;

class CervezasFamiliaController extends Controller
{
    public function index()
    {
        $cervezas_familias = CervezasFamilia::orderBy('nombre')->paginate();
        return view('cervezas_familias.index', compact('cervezas_familias'));
    }

    public function create()
    {
        $cervezas_fermentos = CervezasFermento::pluck('nombre', 'fermento_id');
        return view('cervezas_familias.create', compact('cervezas_fermentos'));
    }

    public function store(StoreCervezaFamilia $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $cervezas_familia = CervezasFamilia::create($request->all());
        return redirect()->route('cervezas_familias.show', $cervezas_familia);
    }

    public function show(CervezasFamilia $cervezas_familia)
    {
        return view('cervezas_familias.show', compact('cervezas_familia'));
    }

    public function edit(CervezasFamilia $cervezas_familia)
    {
        $cervezas_fermentos = CervezasFermento::pluck('nombre', 'fermento_id');
        return view('cervezas_familias.edit', compact(['cervezas_familia', 'cervezas_fermentos']));
    }

    public function update(StoreCervezaFamilia $request, CervezasFamilia $cervezas_familia)
    {
        $request['slug'] = str()->slug($request->nombre);
        $cervezas_familia->update($request->all());
        return redirect()->route('cervezas_familias.show', $cervezas_familia);
    }

    public function destroy(CervezasFamilia $cervezas_familia)
    {
        $cervezas_familia->delete();
        return redirect()->route('cervezas_familias.index');
    }
}
