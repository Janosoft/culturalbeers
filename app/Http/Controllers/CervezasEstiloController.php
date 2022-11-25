<?php

namespace App\Http\Controllers;

use App\Models\CervezasEstilo;
use App\Http\Requests\StoreCervezaEstilo;

class CervezasEstiloController extends Controller
{
    public function index()
    {
        $cervezas_estilos = CervezasEstilo::orderBy('nombre')->paginate();
        return view('cervezas_estilos.index', compact('cervezas_estilos'));
    }

    public function create()
    {
        return view('cervezas_estilos.create');
    }

    public function store(StoreCervezaEstilo $request)
    {
        $cervezas_estilo = CervezasEstilo::create($request->all());
        return redirect()->route('cervezas_estilos.show', $cervezas_estilo);
    }

    public function show(CervezasEstilo $cervezas_estilo)
    {
        return view('cervezas_estilos.show', compact('cervezas_estilo'));
    }

    public function edit(CervezasEstilo $cervezas_estilo)
    {
        return view('cervezas_estilos.edit', compact('cervezas_estilo'));
    }

    public function update(StoreCervezaEstilo $request, CervezasEstilo $cervezas_estilo)
    {
        $cervezas_estilo->update($request->all());
        return redirect()->route('cervezas_estilos.show', $cervezas_estilo);
    }
}
