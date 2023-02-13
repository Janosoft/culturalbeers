<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComentario;
use App\Http\Requests\StoreProductor;
use App\Models\Comentario;
use App\Models\Imagen;
use App\Models\Localidad;
use App\Models\Productor;
use App\Models\ProductoresFabricacion;
use Illuminate\Support\Facades\Redirect;

class ProductorController extends Controller
{
    public function index()
    {
        $productores = Productor::orderBy('nombre')->paginate();

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
        //FIXME almacenar en $request['localidad_id'] el resultado de buscar el nombre de la localidad
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
        $localidades = Localidad::pluck('nombre', 'localidad_id');

        return view('productores.edit', compact(['productor', 'fabricaciones', 'localidades']));
    }

    public function update(StoreProductor $request, Productor $productor)
    {
        $request['slug'] = str()->slug($request->nombre);
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
            'usuario_id' => 1, //TODO poner el usuario
        ]);

        session()->flash('statusTitle', 'Comentario Creado');
        session()->flash('statusMessage', 'El comentario fue creado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('productores.show', $productor);
    }

    public function verify(Productor $productor)
    {
        $productor->verificado= true;
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
}
