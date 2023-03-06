<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComentario;
use App\Http\Requests\StoreLocalidad;
use App\Models\Comentario;
use App\Models\DivisionPolitica;
use App\Models\Localidad;
use Illuminate\Support\Facades\Auth;

class LocalidadController extends Controller
{
    public function index()
    {
        $localidades = Localidad::withTrashed()
            ->orderBy('deleted_at')
            ->orderBy('nombre')
            ->paginate();

        return view('localidades.index', compact('localidades'));
    }

    public function create()
    {
        $divisiones_politicas = DivisionPolitica::pluck('nombre', 'division_politica_id');

        return view('localidades.create', compact('divisiones_politicas'));
    }

    public function store(StoreLocalidad $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $request['user_id'] = Auth::user()->user_id;
        $localidad = Localidad::create($request->all());
        session()->flash('statusTitle', 'Localidad Creada');
        session()->flash('statusMessage', 'La localidad fue creada correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('localidades.show', $localidad);
    }

    public function show(Localidad $localidad)
    {
        return view('localidades.show', compact('localidad'));
    }

    public function edit(Localidad $localidad)
    {
        $divisiones_politicas = DivisionPolitica::pluck('nombre', 'division_politica_id');

        return view('localidades.edit', compact(['localidad', 'divisiones_politicas']));
    }

    public function update(StoreLocalidad $request, Localidad $localidad)
    {
        $request['slug'] = str()->slug($request->nombre);
        $localidad->update($request->all());
        session()->flash('statusTitle', 'Localidad Actualizada');
        session()->flash('statusMessage', 'La localidad fue actualizada correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('localidades.show', $localidad);
    }

    public function comment(StoreComentario $request, Localidad $localidad)
    {
        Comentario::create([
            'comentario' => $request->comentario,
            'commentable_type' => Localidad::class,
            'commentable_id' => $localidad->localidad_id,
            'user_id' => Auth::user()->user_id,
        ]);

        session()->flash('statusTitle', 'Comentario Creado');
        session()->flash('statusMessage', 'El comentario fue creado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('localidades.show', $localidad);
    }

    public function destroy(Localidad $localidad)
    {
        $localidad->delete();
        session()->flash('statusTitle', 'Localidad Eliminada');
        session()->flash('statusMessage', 'La localidad fue eliminada correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('localidades.index');
    }

    public function forcedelete(int $localidad_id)
    {
        $localidad = Localidad::withTrashed()->find($localidad_id);
        $localidad->loadCount('lugares');
        $localidad->loadCount('productores');

        if ($localidad->lugares_count == 0) {
            if ($localidad->productores_count == 0) {
                $localidad->lugares()->forceDelete();
                $localidad->productores()->forceDelete();
                $localidad->forceDelete();
                session()->flash('statusTitle', 'Localidad Eliminada');
                session()->flash('statusMessage', 'La localidad fue eliminado correctamente.');
                session()->flash('statusColor', 'success');
            } else {
                session()->flash('statusTitle', 'Error al eliminar Localidad');
                session()->flash('statusMessage', 'La localidad está siendo utilizada en al menos un productor.');
                session()->flash('statusColor', 'danger');
            }
        } else {
            session()->flash('statusTitle', 'Error al eliminar Localidad');
            session()->flash('statusMessage', 'La localidad está siendo utilizada en al menos un lugar.');
            session()->flash('statusColor', 'danger');
        }

        return redirect()->route('localidades.index');
    }

    public function restore(int $localidad_id)
    {
        Localidad::withTrashed()->find($localidad_id)->restore();
        session()->flash('statusTitle', 'Localidad Restaurada');
        session()->flash('statusMessage', 'La localidad fue restaurado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('localidades.index');
    }
}
