<?php

namespace App\Http\Controllers;

use App\Models\LugaresCategoria;
use App\Http\Requests\StoreLugaresCategoria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LugaresCategoriaController extends Controller
{
    public function index()
    {
        $lugares_categorias = LugaresCategoria::withTrashed()
            ->orderBy('deleted_at')
            ->orderBy('nombre')
            ->paginate();

        return view('lugares_categorias.index', compact('lugares_categorias'));
    }

    public function create()
    {
        return view('lugares_categorias.create');
    }

    public function store(StoreLugaresCategoria $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $request['user_id'] = Auth::user()->user_id;
        $lugares_categoria = LugaresCategoria::create($request->all());
        session()->flash('statusTitle', 'Categoría Creada');
        session()->flash('statusMessage', 'La categoría de lugares fue creada correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('lugares_categorias.show', $lugares_categoria);
    }

    public function show(LugaresCategoria $lugares_categoria)
    {
        return view('lugares_categorias.show', compact('lugares_categoria'));
    }

    public function edit(LugaresCategoria $lugares_categoria)
    {
        return view('lugares_categorias.edit', compact('lugares_categoria'));
    }

    public function update(StoreLugaresCategoria $request, LugaresCategoria $lugares_categoria)
    {
        $request['slug'] = str()->slug($request->nombre);
        $lugares_categoria->update($request->all());
        session()->flash('statusTitle', 'Categoría Actualizada');
        session()->flash('statusMessage', 'La categoría de lugares fue actualizada correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('lugares_categorias.show', $lugares_categoria);
    }

    public function destroy(LugaresCategoria $lugares_categoria)
    {
        $lugares_categoria->delete();
        session()->flash('statusTitle', 'Categoría Eliminada');
        session()->flash('statusMessage', 'La categoría de lugares fue eliminada correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('lugares_categorias.index');
    }

    public function forcedelete(int $categoria_id)
    {
        $lugares_categoria = LugaresCategoria::withTrashed()->find($categoria_id);
        $lugares_categoria->loadCount('lugares');
        if ($lugares_categoria->lugares_count == 0) {
            $lugares_categoria->lugares()->forceDelete();
            $lugares_categoria->forceDelete();
            session()->flash('statusTitle', 'Categoría Eliminada');
            session()->flash('statusMessage', 'La categoría de lugares fue eliminada correctamente.');
            session()->flash('statusColor', 'success');
        }
        else
        {
            session()->flash('statusTitle', 'Error al eliminar Categoría');
            session()->flash('statusMessage', 'La categoría de lugares está siendo utilizada en al menos un lugar.');
            session()->flash('statusColor', 'danger');
        }

        return redirect()->route('lugares_categorias.index');
    }

    public function restore(int $categoria_id)
    {
        LugaresCategoria::withTrashed()->find($categoria_id)->restore();
        session()->flash('statusTitle', 'Categoría Restaurada');
        session()->flash('statusMessage', 'La categoría de lugares fue restaurada correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('lugares_categorias.index');
    }
}
