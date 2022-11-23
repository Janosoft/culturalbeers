<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CervezasEstilo;

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

    public function store(Request $request)
    {
        $cervezas_estilo = new CervezasEstilo();
        $cervezas_estilo->nombre = $request->nombre;
        $cervezas_estilo->save();
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

    public function update(Request $request, CervezasEstilo $cervezas_estilo)
    {
        $cervezas_estilo->nombre = $request->nombre;
        $cervezas_estilo->save();
        return redirect()->route('cervezas_estilos.show', $cervezas_estilo);
    }
}
