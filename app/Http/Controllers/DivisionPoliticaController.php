<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDivisionPolitica;
use App\Models\DivisionPolitica;
use App\Models\Pais;

class DivisionPoliticaController extends Controller
{
    public function index()
    {
        $divisiones_politicas = DivisionPolitica::withTrashed()
            ->orderBy('deleted_at')
            ->orderBy('nombre')
            ->paginate();

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

    public function forcedelete(int $division_politica_id)
    {
        $division_politica = DivisionPolitica::withTrashed()->find($division_politica_id);
        $division_politica->loadCount('localidades');
        if ($division_politica->localidades_count == 0) {
            $division_politica->localidades()->forceDelete();
            $division_politica->forceDelete();
            session()->flash('statusTitle', 'División Política Eliminada');
            session()->flash('statusMessage', 'La división política fue eliminada correctamente.');
            session()->flash('statusColor', 'success');
        }
        else
        {
            session()->flash('statusTitle', 'Error al eliminar División Política');
            session()->flash('statusMessage', 'La división política está siendo utilizada en al menos una localidad.');
            session()->flash('statusColor', 'danger');
        }

        return redirect()->route('divisiones_politicas.index');
    }

    public function restore(int $division_politica_id)
    {
        DivisionPolitica::withTrashed()->find($division_politica_id)->restore();
        session()->flash('statusTitle', 'División Política Restaurada');
        session()->flash('statusMessage', 'La división política fue restaurada correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('divisiones_politicas.index');
    }
}
