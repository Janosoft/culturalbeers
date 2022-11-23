<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CervezasFamilia;

class CervezasFamiliaController extends Controller
{
    public function index()
    {
        $cervezas_familias = CervezasFamilia::orderBy('nombre')->paginate();
        return view('cervezas_familias.index', compact('cervezas_familias'));
    }

    public function create()
    {
        return view('cervezas_familias.create');
    }

    public function store(Request $request)
    {
        $cervezas_familia = new CervezasFamilia();
        $cervezas_familia->nombre = $request->nombre;
        $cervezas_familia->save();
        return redirect()->route('cervezas_familias.show', $cervezas_familia);
    }

    public function show(CervezasFamilia $cervezas_familia)
    {
        return view('cervezas_familias.show', compact('cervezas_familia'));
    }

    public function edit(CervezasFamilia $cervezas_familia)
    {
        return view('cervezas_familias.edit', compact('cervezas_familia'));
    }

    public function update(Request $request, CervezasFamilia $cervezas_familia)
    {
        $cervezas_familia->nombre = $request->nombre;
        $cervezas_familia->save();
        return redirect()->route('cervezas_familias.show', $cervezas_familia);
    }
}
