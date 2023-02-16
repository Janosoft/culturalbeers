<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComentario;
use App\Http\Requests\StoreLugar;
use App\Models\Comentario;
use App\Models\Imagen;
use App\Models\Localidad;
use App\Models\Lugar;
use Illuminate\Support\Facades\Redirect;

class LugarController extends Controller
{
    public function index()
    {
        $lugares = Lugar::withTrashed()
            ->orderBy('deleted_at')
            ->orderBy('nombre')
            ->paginate();

        return view('lugares.index', compact('lugares'));
    }

    public function create()
    {
        return view('Lugares.create');
    }

    public function store(StoreLugar $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $request['localidad_id'] = Localidad::getByName($request->localidad)->localidad_id;
        $lugar = Lugar::create($request->all());
        if ($request->imagen) {
            $fileName = time().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('storage/imagenes'), $fileName);
            Imagen::create([
                'imageable_id' => $lugar->lugar_id,
                'url' => 'imagenes/'.$fileName,
                'imageable_type' => Lugar::class,
            ]);
        }
        session()->flash('statusTitle', 'Lugar Creado');
        session()->flash('statusMessage', 'El lugar fue creado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('lugares.show', $lugar);
    }

    public function show(Lugar $lugar)
    {
        return view('lugares.show', compact('lugar'));
    }

    public function edit(Lugar $lugar)
    {
        return view('lugares.edit', compact(['lugar']));
    }

    public function update(StoreLugar $request, Lugar $lugar)
    {
        $request['slug'] = str()->slug($request->nombre);
        $request['localidad_id'] = Localidad::getByName($request->localidad)->localidad_id;
        $lugar->update($request->all());
        session()->flash('statusTitle', 'Lugar Actualizado');
        session()->flash('statusMessage', 'El lugar fue actualizado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('lugares.show', $lugar);
    }

    public function comment(StoreComentario $request, Lugar $lugar)
    {
        Comentario::create([
            'comentario' => $request->comentario,
            'commentable_type' => Lugar::class,
            'commentable_id' => $lugar->lugar_id,
            'usuario_id' => 1, //TODO poner el usuario
        ]);

        session()->flash('statusTitle', 'Comentario Creado');
        session()->flash('statusMessage', 'El comentario fue creado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('lugares.show', $lugar);
    }

    public function verify(Lugar $lugar)
    {
        $lugar->verificado = true;
        $lugar->save();
        session()->flash('statusTitle', 'Lugar Verificado');
        session()->flash('statusMessage', 'El lugar fue verificado correctamente.');
        session()->flash('statusColor', 'success');

        return Redirect::back();
    }

    public function destroy(Lugar $lugar)
    {
        $lugar->delete();
        session()->flash('statusTitle', 'Lugar Eliminado');
        session()->flash('statusMessage', 'El lugar fue eliminado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('lugares.index');
    }

    public function forcedelete(int $lugar_id)
    {
        $lugar = Lugar::withTrashed()->find($lugar_id);
        $lugar->forceDelete();
        session()->flash('statusTitle', 'Lugar Eliminado');
        session()->flash('statusMessage', 'El lugar fue eliminado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('paises.index');
    }

    public function restore(int $lugar_id)
    {
        Lugar::withTrashed()->find($lugar_id)->restore();
        session()->flash('statusTitle', 'Lugar Restaurado');
        session()->flash('statusMessage', 'El lugar fue restaurado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('paises.index');
    }
}
