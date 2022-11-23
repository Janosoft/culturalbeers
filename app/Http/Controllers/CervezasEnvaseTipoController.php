<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CervezasEnvaseTipo;

class CervezasEnvaseTipoController extends Controller
{
    public function index()
    {
        $cervezas_envases_tipos = CervezasEnvaseTipo::orderBy('nombre')->paginate();
        return view('cervezas_envases_tipos.index', compact('cervezas_envases_tipos'));
    }

    public function create()
    {
        return view('cervezas_envases_tipos.create');
    }

    public function store(Request $request)
    {
        $cervezas_envase_tipo = new CervezasEnvaseTipo();
        $cervezas_envase_tipo->nombre = $request->nombre;
        $cervezas_envase_tipo->save();
        return redirect()->route('cervezas_envases_tipos.show', $cervezas_envase_tipo);
    }

    public function show(CervezasEnvaseTipo $cervezas_envase_tipo)
    {
        return view('cervezas_envases_tipos.show', compact('cervezas_envase_tipo'));
    }

    public function edit(CervezasEnvaseTipo $cervezas_envase_tipo)
    {
        return view('cervezas_envases_tipos.edit', compact('cervezas_envase_tipo'));
    }

    public function update(Request $request, CervezasEnvaseTipo $cervezas_envase_tipo)
    {
        $cervezas_envase_tipo->nombre = $request->nombre;
        $cervezas_envase_tipo->save();
        return redirect()->route('cervezas_envases_tipos.show', $cervezas_envase_tipo);
    }
}
