<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductorFabricacion;
use App\Models\ProductoresFabricacion;
use Illuminate\Support\Facades\Auth;

class ProductoresFabricacionController extends Controller
{
    public function index()
    {
        $productores_fabricaciones = ProductoresFabricacion::withTrashed()
            ->orderBy('deleted_at')
            ->orderBy('nombre')
            ->paginate();

        return view('productores_fabricaciones.index', compact('productores_fabricaciones'));
    }

    public function create()
    {
        return view('productores_fabricaciones.create');
    }

    public function store(StoreProductorFabricacion $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $request['user_id'] = Auth::user()->user_id;
        $productores_fabricacion = ProductoresFabricacion::create($request->all());
        session()->flash('statusTitle', 'Fabricación Creada');
        session()->flash('statusMessage', 'El tipo de fabricación fue creado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('productores_fabricaciones.show', $productores_fabricacion);
    }

    public function show(ProductoresFabricacion $productores_fabricacion)
    {
        return view('productores_fabricaciones.show', compact('productores_fabricacion'));
    }

    public function edit(ProductoresFabricacion $productores_fabricacion)
    {
        return view('productores_fabricaciones.edit', compact('productores_fabricacion'));
    }

    public function update(StoreProductorFabricacion $request, ProductoresFabricacion $productores_fabricacion)
    {
        $request['slug'] = str()->slug($request->nombre);
        $productores_fabricacion->update($request->all());
        session()->flash('statusTitle', 'Fabricación Actualizada');
        session()->flash('statusMessage', 'El tipo de fabricación fue actualizado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('productores_fabricaciones.show', $productores_fabricacion);
    }

    public function destroy(ProductoresFabricacion $productores_fabricacion)
    {
        $productores_fabricacion->delete();
        session()->flash('statusTitle', 'Fabricación Eliminada');
        session()->flash('statusMessage', 'El tipo de fabricación fue eliminado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('productores_fabricaciones.index');
    }

    public function forcedelete(int $fabricacion_id)
    {
        $productores_fabricacion = ProductoresFabricacion::withTrashed()->find($fabricacion_id);
        $productores_fabricacion->loadCount('productores');
        if ($productores_fabricacion->productores_count == 0) {
            $productores_fabricacion->productores()->forceDelete();
            $productores_fabricacion->forceDelete();
            session()->flash('statusTitle', 'Fabricación Eliminado');
            session()->flash('statusMessage', 'El tipo de fabricación fue eliminado correctamente.');
            session()->flash('statusColor', 'success');
        } else {
            session()->flash('statusTitle', 'Error al eliminar Fabricación');
            session()->flash('statusMessage', 'El tipo de fabricación está siendo utilizado en al menos un productor.');
            session()->flash('statusColor', 'danger');
        }

        return redirect()->route('productores_fabricaciones.index');
    }

    public function restore(int $fabricacion_id)
    {
        ProductoresFabricacion::withTrashed()->find($fabricacion_id)->restore();
        session()->flash('statusTitle', 'Fabricación Restaurado');
        session()->flash('statusMessage', 'El tipo de fabricación fue restaurado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('productores_fabricaciones.index');
    }
}
