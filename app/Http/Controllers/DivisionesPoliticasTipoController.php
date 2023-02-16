<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDivisionPoliticaTipo;
use App\Models\DivisionesPoliticasTipo;

class DivisionesPoliticasTipoController extends Controller
{
    public function index()
    {
        $divisiones_politicas_tipos = DivisionesPoliticasTipo::withTrashed()
            ->orderBy('deleted_at')
            ->orderBy('nombre')
            ->paginate();

        return view('divisiones_politicas_tipos.index', compact('divisiones_politicas_tipos'));
    }

    public function create()
    {
        return view('divisiones_politicas_tipos.create');
    }

    public function store(StoreDivisionPoliticaTipo $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $divisiones_politicas_tipo = DivisionesPoliticasTipo::create($request->all());
        session()->flash('statusTitle', 'Tipo Creado');
        session()->flash('statusMessage', 'El tipo de división política fue creado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('divisiones_politicas_tipos.show', $divisiones_politicas_tipo);
    }

    public function show(DivisionesPoliticasTipo $divisiones_politicas_tipo)
    {
        return view('divisiones_politicas_tipos.show', compact('divisiones_politicas_tipo'));
    }

    public function edit(DivisionesPoliticasTipo $divisiones_politicas_tipo)
    {
        return view('divisiones_politicas_tipos.edit', compact('divisiones_politicas_tipo'));
    }

    public function update(StoreDivisionPoliticaTipo $request, DivisionesPoliticasTipo $divisiones_politicas_tipo)
    {
        $request['slug'] = str()->slug($request->nombre);
        $divisiones_politicas_tipo->update($request->all());
        session()->flash('statusTitle', 'Tipo Actualizado');
        session()->flash('statusMessage', 'El tipo de división política fue actualizado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('divisiones_politicas_tipos.show', $divisiones_politicas_tipo);
    }

    public function destroy(DivisionesPoliticasTipo $divisiones_politicas_tipo)
    {
        $divisiones_politicas_tipo->delete();
        session()->flash('statusTitle', 'Tipo Eliminado');
        session()->flash('statusMessage', 'El tipo de división política fue eliminado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('divisiones_politicas_tipos.index');
    }

    public function forcedelete(int $division_politica_tipo_id)
    {
        $divisiones_politicas_tipo = DivisionesPoliticasTipo::withTrashed()->find($division_politica_tipo_id);
        $divisiones_politicas_tipo->loadCount('paises');
        if ($divisiones_politicas_tipo->paises_count == 0) {
            $divisiones_politicas_tipo->paises()->forceDelete();
            $divisiones_politicas_tipo->forceDelete();
            session()->flash('statusTitle', 'Tipo Eliminado');
            session()->flash('statusMessage', 'El tipo de división política fue eliminado correctamente.');
            session()->flash('statusColor', 'success');
        }
        else
        {
            session()->flash('statusTitle', 'Error al eliminar Tipo');
            session()->flash('statusMessage', 'El tipo de división política está siendo utilizado en al menos un país.');
            session()->flash('statusColor', 'danger');
        }

        return redirect()->route('divisiones_politicas_tipos.index');
    }

    public function restore(int $division_politica_tipo_id)
    {
        DivisionesPoliticasTipo::withTrashed()->find($division_politica_tipo_id)->restore();
        session()->flash('statusTitle', 'Tipo Restaurado');
        session()->flash('statusMessage', 'El tipo de división política fue restaurado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('divisiones_politicas_tipos.index');
    }
}
