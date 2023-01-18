<?php

namespace App\Http\Controllers;

use App\Models\DivisionPolitica;
use App\Http\Requests\StoreDivisionPolitica;
use App\Models\Pais;

class DivisionPoliticaController extends Controller
{
    public function index()
    {
        $divisiones_politicas = DivisionPolitica::orderBy('nombre')->paginate();

        return view('divisiones_politicas.index', compact('divisiones_politicas'));
    }

    public function create()
    {
        $paises = Pais::pluck('nombre', 'pais_id');

        return view('divisiones_politicas.create', compact('paises'));
    }

    public function store(StoreDivisionPolitica $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $division_politica = DivisionPolitica::create($request->all());
        session()->flash('statusTitle', 'División Política Creada');
        session()->flash('statusMessage', 'La división política fue creada correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('divisiones_politicas.show', $division_politica);
    }

    public function show(DivisionPolitica $division_politica)
    {
        return view('divisiones_politicas.show', compact('division_politica'));
    }

    public function edit(DivisionPolitica $division_politica)
    {
        $paises = Pais::pluck('nombre', 'pais_id');

        return view('divisiones_politicas.edit', compact(['division_politica', 'paises']));
    }

    public function update(StoreDivisionPolitica $request, DivisionPolitica $division_politica)
    {
        $request['slug'] = str()->slug($request->nombre);
        $division_politica->update($request->all());
        session()->flash('statusTitle', 'División Política Actualizada');
        session()->flash('statusMessage', 'La división política fue actualizada correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('divisiones_politicas.show', $division_politica);
    }

    public function destroy(DivisionPolitica $division_politica)
    {
        $division_politica->delete();
        session()->flash('statusTitle', 'División Política Eliminada');
        session()->flash('statusMessage', 'La división política fue eliminada correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('divisiones_politicas.index');
    }
}
