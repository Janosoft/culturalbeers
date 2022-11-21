<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DivisionesPoliticasTipo;

class DivisionPoliticaTipoController extends Controller
{
    public function index()
    {
        $divisiones_politicas_tipos= DivisionesPoliticasTipo::paginate();
        return view('divisiones_politicas_tipos.index', compact('divisiones_politicas_tipos'));
    }

    public function create()
    {
        return view('divisiones_politicas_tipos.create');
    }

    public function show($division_politica_tipo)
    {
        return view('divisiones_politicas_tipos.show', compact('division_politica_tipo'));
    }

}
