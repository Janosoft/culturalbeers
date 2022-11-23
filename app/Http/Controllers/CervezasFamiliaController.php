<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CervezasFamilia;

class CervezasFamiliaController extends Controller
{
    public function index()
    {
        $cervezas_familias = CervezasFamilia::paginate();
        return view('cervezas_familias.index', compact('cervezas_familias'));
    }

    public function create()
    {
        return view('cervezas_familias.create');
    }

    public function show($familia_id)
    {
        $cervezas_familia = CervezasFamilia::find($familia_id);
        return view('cervezas_familias.show', compact('cervezas_familia'));
    }
}
