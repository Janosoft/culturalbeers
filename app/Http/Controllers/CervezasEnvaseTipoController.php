<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCervezaEnvaseTipo;
use App\Models\CervezasEnvaseTipo;

class CervezasEnvaseTipoController extends Controller
{
    public function index()
    {
        $cervezas_envases_tipos = CervezasEnvaseTipo::withTrashed()
            ->orderBy('deleted_at')
            ->orderBy('nombre')
            ->paginate();

        return view('cervezas_envases_tipos.index', compact('cervezas_envases_tipos'));
    }

    public function create()
    {
        return view('cervezas_envases_tipos.create');
    }

    public function store(StoreCervezaEnvaseTipo $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $cervezas_envases_tipo = CervezasEnvaseTipo::create($request->all());
        session()->flash('statusTitle', 'Envase Creado');
        session()->flash('statusMessage', 'El tipo de envase fue creado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas_envases_tipos.show', $cervezas_envases_tipo);
    }

    public function show(CervezasEnvaseTipo $cervezas_envases_tipo)
    {
        return view('cervezas_envases_tipos.show', compact('cervezas_envases_tipo'));
    }

    public function edit(CervezasEnvaseTipo $cervezas_envases_tipo)
    {
        return view('cervezas_envases_tipos.edit', compact('cervezas_envases_tipo'));
    }

    public function update(StoreCervezaEnvaseTipo $request, CervezasEnvaseTipo $cervezas_envases_tipo)
    {
        $request['slug'] = str()->slug($request->nombre);
        $cervezas_envases_tipo->update($request->all());
        session()->flash('statusTitle', 'Envase Actualizado');
        session()->flash('statusMessage', 'El tipo de envase fue actualizado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas_envases_tipos.show', $cervezas_envases_tipo);
    }

    public function destroy(CervezasEnvaseTipo $cervezas_envases_tipo)
    {
        $cervezas_envases_tipo->delete();
        session()->flash('statusTitle', 'Envase Eliminado');
        session()->flash('statusMessage', 'El tipo de envase fue eliminado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas_envases_tipos.index');
    }

    public function forcedelete(int $envase_id)
    {
        $cervezas_envases_tipo = CervezasEnvaseTipo::withTrashed()->find($envase_id);
        $cervezas_envases_tipo->loadCount('cervezas');
        if ($cervezas_envases_tipo->cervezas_count == 0) {
            $cervezas_envases_tipo->cervezas()->forceDelete();
            $cervezas_envases_tipo->forceDelete();
            session()->flash('statusTitle', 'Envase Eliminado');
            session()->flash('statusMessage', 'El tipo de envase fue eliminado correctamente.');
            session()->flash('statusColor', 'success');
        }
        else
        {
            session()->flash('statusTitle', 'Error al eliminar Envase');
            session()->flash('statusMessage', 'El tipo de envase está siendo utilizado en al menos una cerveza.');
            session()->flash('statusColor', 'danger');
        }

        return redirect()->route('cervezas_envases_tipos.index');
    }

    public function restore(int $envase_id)
    {
        CervezasEnvaseTipo::withTrashed()->find($envase_id)->restore();
        session()->flash('statusTitle', 'Envase Restaurado');
        session()->flash('statusMessage', 'El tipo de envase fue restaurado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas_envases_tipos.index');
    }
}
