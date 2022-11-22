<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CervezasEstilo;

class CervezasEstiloController extends Controller
{
    public function index()
    {
        $cervezas_estilos= CervezasEstilo::paginate();
        return view('cervezas_estilos.index', compact('cervezas_estilos'));
    }

    public function create()
    {
        return view('cervezas_estilos.create');
    }

    public function show($cervezas_estilo)
    {
        return view('cervezas_estilos.show', compact('cervezas_estilo'));
    }
}
