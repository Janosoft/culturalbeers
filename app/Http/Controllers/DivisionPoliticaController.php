<?php

namespace App\Http\Controllers;

use App\Models\DivisionPolitica;
use App\Http\Requests\StoreDivisionPolitica;

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

    public function store(StoreDivisionPolitica $request)
    {
        $division_politica = DivisionPolitica::create($request->all());
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

    public function update(StoreDivisionPolitica $request, DivisionPolitica $division_politica)
    {
        $division_politica->update($request->all());
        return redirect()->route('divisiones_politicas.show', $division_politica);
    }
}
