<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCervezaColor;
use App\Models\CervezasColor;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Integer;

class CervezasColorController extends Controller
{
    public function index()
    {
        $cervezas_colores = CervezasColor::withTrashed()
            ->orderBy('deleted_at')
            ->orderBy('nombre')
            ->paginate();

        return view('cervezas_colores.index', compact('cervezas_colores'));
    }

    public function create()
    {
        return view('cervezas_colores.create');
    }

    public function store(StoreCervezaColor $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $request['user_id'] = Auth::user()->user_id;
        $cervezas_color = CervezasColor::create($request->all());
        session()->flash('statusTitle', 'Color Creado');
        session()->flash('statusMessage', 'El color de cervezas fue creado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas_colores.show', $cervezas_color);
    }

    public function show(CervezasColor $cervezas_color)
    {
        return view('cervezas_colores.show', compact('cervezas_color'));
    }

    public function edit(CervezasColor $cervezas_color)
    {
        return view('cervezas_colores.edit', compact('cervezas_color'));
    }

    public function update(StoreCervezaColor $request, CervezasColor $cervezas_color)
    {
        $request['slug'] = str()->slug($request->nombre);
        $cervezas_color->update($request->all());
        session()->flash('statusTitle', 'Color Actualizado');
        session()->flash('statusMessage', 'El color de cervezas fue actualizado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas_colores.show', $cervezas_color);
    }

    public function destroy(CervezasColor $cervezas_color)
    {
        $cervezas_color->delete();
        session()->flash('statusTitle', 'Color Eliminado');
        session()->flash('statusMessage', 'El color de cervezas fue eliminado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas_colores.index');
    }

    public function forcedelete(int $color_id)
    {
        $cervezas_color = CervezasColor::withTrashed()->find($color_id);
        $cervezas_color->loadCount('cervezas');
        if ($cervezas_color->cervezas_count == 0) {
            $cervezas_color->forceDelete();
            session()->flash('statusTitle', 'Color Eliminado');
            session()->flash('statusMessage', 'El color de cervezas fue eliminado correctamente.');
            session()->flash('statusColor', 'success');
        }
        else
        {
            session()->flash('statusTitle', 'Error al eliminar Color');
            session()->flash('statusMessage', 'El color está siendo utilizado en al menos una cerveza.');
            session()->flash('statusColor', 'danger');
        }

        return redirect()->route('cervezas_colores.index');
    }

    public function restore(int $color_id)
    {
        CervezasColor::withTrashed()->find($color_id)->restore();
        session()->flash('statusTitle', 'Color Restaurado');
        session()->flash('statusMessage', 'El color de cervezas fue restaurado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas_colores.index');
    }
}
