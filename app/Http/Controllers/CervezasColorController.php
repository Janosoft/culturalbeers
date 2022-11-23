<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CervezasColor;

class CervezasColorController extends Controller
{
    public function index()
    {
        $cervezas_colores = CervezasColor::paginate();
        return view('cervezas_colores.index', compact('cervezas_colores'));
    }

    public function create()
    {
        return view('cervezas_colores.create');
    }

    public function show($color_id)
    {
        $cervezas_color = CervezasColor::find($color_id);
        return view('cervezas_colores.show', compact('cervezas_color'));
    }
}
