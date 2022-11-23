<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CervezasColor;

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

    public function store(Request $request)
    {
        $cervezas_color = new CervezasColor();
        $cervezas_color->nombre = $request->nombre;
        $cervezas_color->save();
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

    public function update(Request $request, CervezasColor $cervezas_color)
    {
        $cervezas_color->nombre = $request->nombre;
        $cervezas_color->save();
        return redirect()->route('cervezas_colores.show', $cervezas_color);
    }
}
