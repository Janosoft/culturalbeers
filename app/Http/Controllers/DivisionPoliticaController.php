<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DivisionPolitica;

class DivisionPoliticaController extends Controller
{
    public function index()
    {
        $divisiones_politicas = DivisionPolitica::orderBy('nombre')->paginate();
        return view('divisiones_politicas.index', compact('divisiones_politicas'));
    }

    public function create()
    {
        return view('divisiones_politicas.create');
    }

    public function store(Request $request)
    {
        $division_politica = new DivisionPolitica();
        $division_politica->nombre = $request->nombre;
        $division_politica->save();
        return redirect()->route('divisiones_politicas.show', $division_politica);
    }

    public function show(DivisionPolitica $division_politica)
    {
        return view('divisiones_politicas.show', compact('division_politica'));
    }

    public function edit(DivisionPolitica $division_politica)
    {
        return view('divisiones_politicas.edit', compact('division_politica'));
    }

    public function update(Request $request, DivisionPolitica $division_politica)
    {
        $division_politica->nombre = $request->nombre;
        $division_politica->save();
        return redirect()->route('divisiones_politicas.show', $division_politica);
    }
}
