<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContinente;
use App\Models\Continente;
use Illuminate\Support\Facades\Auth;

class ContinenteController extends Controller
{
    public function index()
    {
        $continentes = Continente::withTrashed()
            ->orderBy('deleted_at')
            ->orderBy('nombre')
            ->paginate();

        return view('continentes.index', compact('continentes'));
    }

    public function create()
    {
        return view('continentes.create');
    }

    public function store(StoreContinente $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $request['user_id'] = Auth::user()->user_id;
        $continente = Continente::create($request->all());

        return redirect()->route('continentes.show', $continente);
    }

    public function show(Continente $continente)
    {
        return view('continentes.show', compact('continente'));
    }

    public function edit(Continente $continente)
    {
        return view('continentes.edit', compact('continente'));
    }

    public function update(StoreContinente $request, Continente $continente)
    {
        $request['slug'] = str()->slug($request->nombre);
        $continente->update($request->all());
        session()->flash('statusTitle', 'Continente Actualizado');
        session()->flash('statusMessage', 'El continente fue actualizado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('continentes.show', $continente);
    }

    public function destroy(Continente $continente)
    {
        $continente->delete();
        session()->flash('statusTitle', 'Continente Eliminado');
        session()->flash('statusMessage', 'El continente fue eliminado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('continentes.index');
    }

    public function forcedelete(int $continente_id)
    {
        $continente = Continente::withTrashed()->find($continente_id);
        $continente->loadCount('paises');
        if ($continente->paises_count == 0) {
            $continente->paises()->forceDelete();
            $continente->forceDelete();
            session()->flash('statusTitle', 'Continente Eliminado');
            session()->flash('statusMessage', 'El continente fue eliminado correctamente.');
            session()->flash('statusColor', 'success');
        }
        else
        {
            session()->flash('statusTitle', 'Error al eliminar Continente');
            session()->flash('statusMessage', 'El continente está siendo utilizado en al menos un país.');
            session()->flash('statusColor', 'danger');
        }

        return redirect()->route('continentes.index');
    }

    public function restore(int $continente_id)
    {
        Continente::withTrashed()->find($continente_id)->restore();
        session()->flash('statusTitle', 'Continente Restaurado');
        session()->flash('statusMessage', 'El continente fue restaurado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('continentes.index');
    }
}
