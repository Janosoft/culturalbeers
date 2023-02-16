<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCervezaFamilia;
use App\Http\Requests\StoreComentario;
use App\Models\CervezasFamilia;
use App\Models\CervezasFermento;
use App\Models\Comentario;

class CervezasFamiliaController extends Controller
{
    public function index()
    {
        $cervezas_familias = CervezasFamilia::withTrashed()
            ->orderBy('deleted_at')
            ->orderBy('nombre')
            ->paginate();

        return view('cervezas_familias.index', compact('cervezas_familias'));
    }

    public function create()
    {
        $cervezas_fermentos = CervezasFermento::pluck('nombre', 'fermento_id');

        return view('cervezas_familias.create', compact('cervezas_fermentos'));
    }

    public function store(StoreCervezaFamilia $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $cervezas_familia = CervezasFamilia::create($request->all());
        session()->flash('statusTitle', 'Familia Creada');
        session()->flash('statusMessage', 'La familia de cervezas fue creada correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas_familias.show', $cervezas_familia);
    }

    public function show(CervezasFamilia $cervezas_familia)
    {
        return view('cervezas_familias.show', compact('cervezas_familia'));
    }

    public function edit(CervezasFamilia $cervezas_familia)
    {
        $cervezas_fermentos = CervezasFermento::pluck('nombre', 'fermento_id');

        return view('cervezas_familias.edit', compact(['cervezas_familia', 'cervezas_fermentos']));
    }

    public function update(StoreCervezaFamilia $request, CervezasFamilia $cervezas_familia)
    {
        $request['slug'] = str()->slug($request->nombre);
        $cervezas_familia->update($request->all());
        session()->flash('statusTitle', 'Familia Actualizada');
        session()->flash('statusMessage', 'La familia de cervezas fue actualizada correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas_familias.show', $cervezas_familia);
    }

    public function comment(StoreComentario $request, CervezasFamilia $cervezas_familia)
    {
        Comentario::create([
            'comentario' => $request->comentario,
            'commentable_type' => CervezasFamilia::class,
            'commentable_id' => $cervezas_familia->familia_id,
            'usuario_id' => 1, //TODO poner el usuario
        ]);

        session()->flash('statusTitle', 'Comentario Creado');
        session()->flash('statusMessage', 'El comentario fue creado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas_familias.show', $cervezas_familia);
    }

    public function destroy(CervezasFamilia $cervezas_familia)
    {
        $cervezas_familia->delete();
        session()->flash('statusTitle', 'Familia Eliminada');
        session()->flash('statusMessage', 'La familia de cervezas fue eliminada correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas_familias.index');
    }

    public function forcedelete(int $familia_id)
    {
        $cervezas_familia = CervezasFamilia::withTrashed()->find($familia_id);
        $cervezas_familia->loadCount('estilos');
        if ($cervezas_familia->estilos_count == 0) {
            $cervezas_familia->estilos()->forceDelete();
            $cervezas_familia->forceDelete();
            session()->flash('statusTitle', 'Familia Eliminada');
            session()->flash('statusMessage', 'La familia de cervezas fue eliminada correctamente.');
            session()->flash('statusColor', 'success');
        }
        else
        {
            session()->flash('statusTitle', 'Error al eliminar Familia');
            session()->flash('statusMessage', 'La familia de cervezas está siendo utilizada en al menos un estilo.');
            session()->flash('statusColor', 'danger');
        }

        return redirect()->route('cervezas_familias.index');
    }

    public function restore(int $familia_id)
    {
        CervezasFamilia::withTrashed()->find($familia_id)->restore();
        session()->flash('statusTitle', 'Familia Restaurada');
        session()->flash('statusMessage', 'La familia de cervezas fue restaurada correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas_familias.index');
    }
}
