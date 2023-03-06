<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComentario;
use App\Http\Requests\StoreProductor;
use App\Models\Comentario;
use App\Models\Imagen;
use App\Models\Localidad;
use App\Models\Productor;
use App\Models\ProductoresFabricacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProductorController extends Controller
{
    public function index()
    {
        $productores = Productor::withTrashed()
            ->orderBy('deleted_at')
            ->orderBy('nombre')
            ->paginate();

        return view('productores.index', compact('productores'));
    }

    public function create()
    {
        $fabricaciones = ProductoresFabricacion::pluck('nombre', 'fabricacion_id');

        return view('productores.create', compact(['fabricaciones']));
    }

    public function store(StoreProductor $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $request['user_id'] = Auth::user()->user_id;
        $request['localidad_id'] = Localidad::getByName($request->localidad)->localidad_id;
        $productor = Productor::create($request->all());
        if ($request->imagen) {
            $fileName = time().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('storage/imagenes'), $fileName);
            Imagen::create([
                'imageable_id' => $productor->productor_id,
                'url' => 'imagenes/'.$fileName,
                'imageable_type' => Productor::class,
            ]);
        }
        session()->flash('statusTitle', 'Productor Creado');
        session()->flash('statusMessage', 'El productor fue creado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('productores.show', $productor);
    }

    public function show(Productor $productor)
    {
        return view('productores.show', compact('productor'));
    }

    public function edit(Productor $productor)
    {
        $fabricaciones = ProductoresFabricacion::pluck('nombre', 'fabricacion_id');

        return view('productores.edit', compact(['productor', 'fabricaciones']));
    }

    public function update(StoreProductor $request, Productor $productor)
    {
        $request['slug'] = str()->slug($request->nombre);
        $request['localidad_id'] = Localidad::getByName($request->localidad)->localidad_id;
        $productor->update($request->all());
        session()->flash('statusTitle', 'Productor Actualizado');
        session()->flash('statusMessage', 'El productor fue actualizado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('productores.show', $productor);
    }

    public function comment(StoreComentario $request, Productor $productor)
    {
        Comentario::create([
            'comentario' => $request->comentario,
            'commentable_type' => Productor::class,
            'commentable_id' => $productor->productor_id,
            'user_id' => Auth::user()->user_id,
        ]);

        session()->flash('statusTitle', 'Comentario Creado');
        session()->flash('statusMessage', 'El comentario fue creado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('productores.show', $productor);
    }

    public function verify(Productor $productor)
    {
        $productor->verificado = true;
        $productor->save();
        session()->flash('statusTitle', 'Productor Verificado');
        session()->flash('statusMessage', 'El productor fue verificado correctamente.');
        session()->flash('statusColor', 'success');

        return Redirect::back();
    }

    public function destroy(Productor $productor)
    {
        $productor->delete();
        session()->flash('statusTitle', 'Productor Eliminado');
        session()->flash('statusMessage', 'El productor fue eliminado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('productores.index');
    }

    public function forcedelete(int $productor_id)
    {
        $productor = Productor::withTrashed()->find($productor_id);
        $productor->loadCount('cervezas');
        if ($productor->cervezas_count == 0) {
            $productor->cervezas()->forceDelete();
            $productor->forceDelete();
            session()->flash('statusTitle', 'Productor Eliminado');
            session()->flash('statusMessage', 'El productor fue eliminado correctamente.');
            session()->flash('statusColor', 'success');
        } else {
            session()->flash('statusTitle', 'Error al eliminar Productor');
            session()->flash('statusMessage', 'El productor está siendo utilizado en al menos una cerveza.');
            session()->flash('statusColor', 'danger');
        }

        return redirect()->route('productores.index');
    }

    public function restore(int $productor_id)
    {
        Productor::withTrashed()->find($productor_id)->restore();
        session()->flash('statusTitle', 'Productor Restaurado');
        session()->flash('statusMessage', 'El productor fue restaurado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('productores.index');
    }
}
