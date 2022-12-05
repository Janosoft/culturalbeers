<?php

namespace App\Http\Controllers;

use App\Models\CervezasEstilo;
use App\Http\Requests\StoreCervezaEstilo;
use App\Models\CervezasFamilia;

class CervezasEstiloController extends Controller
{
    public function index()
    {
        $cervezas_estilos = CervezasEstilo::orderBy('nombre')->paginate();
        return view('cervezas_estilos.index', compact('cervezas_estilos'));
    }

    public function create()
    {
        $familias = CervezasFamilia::pluck('nombre', 'familia_id');
        return view('cervezas_estilos.create', compact('familias'));
    }

    public function store(StoreCervezaEstilo $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $cervezas_estilo = CervezasEstilo::create($request->all());
        return redirect()->route('cervezas_estilos.show', $cervezas_estilo);
    }

    public function show(CervezasEstilo $cervezas_estilo)
    {
        return view('cervezas_estilos.show', compact('cervezas_estilo'));
    }

    public function edit(CervezasEstilo $cervezas_estilo)
    {
        $familias = CervezasFamilia::pluck('nombre', 'familia_id');
        return view('cervezas_estilos.edit', compact(['cervezas_estilo', 'familias']));
    }

    public function update(StoreCervezaEstilo $request, CervezasEstilo $cervezas_estilo)
    {
        $request['slug'] = str()->slug($request->nombre);
        $cervezas_estilo->update($request->all());
        return redirect()->route('cervezas_estilos.show', $cervezas_estilo);
    }

    public function destroy(CervezasEstilo $cervezas_estilo)
    {
        $cervezas_estilo->delete();
        return redirect()->route('cervezas_estilos.index');
    }
}
