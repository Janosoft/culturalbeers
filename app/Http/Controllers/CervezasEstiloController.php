<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCervezaEstilo;
use App\Http\Requests\StoreComentario;
use App\Models\CervezasEstilo;
use App\Models\CervezasFamilia;
use App\Models\Comentario;

class CervezasEstiloController extends Controller
{
    public function index()
    {
        $cervezas_estilos = CervezasEstilo::orderBy('nombre')->paginate();

        return view('cervezas_estilos.index', compact('cervezas_estilos'));
    }

    public function create()
    {
        $familias = CervezasFamilia::pluck('nombre', 'familia_id');

        return view('cervezas_estilos.create', compact('familias'));
    }

    public function store(StoreCervezaEstilo $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $cervezas_estilo = CervezasEstilo::create($request->all());
        session()->flash('statusTitle', 'Estilo Creado');
        session()->flash('statusMessage', 'El estilo de cervezas fue creado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas_estilos.show', $cervezas_estilo);
    }

    public function show(CervezasEstilo $cervezas_estilo)
    {
        return view('cervezas_estilos.show', compact('cervezas_estilo'));
    }

    public function edit(CervezasEstilo $cervezas_estilo)
    {
        $familias = CervezasFamilia::pluck('nombre', 'familia_id');

        return view('cervezas_estilos.edit', compact(['cervezas_estilo', 'familias']));
    }

    public function update(StoreCervezaEstilo $request, CervezasEstilo $cervezas_estilo)
    {
        $request['slug'] = str()->slug($request->nombre);
        $cervezas_estilo->update($request->all());
        session()->flash('statusTitle', 'Estilo Actualizado');
        session()->flash('statusMessage', 'El estilo de cervezas fue actualizado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas_estilos.show', $cervezas_estilo);
    }

    public function comment(StoreComentario $request, CervezasEstilo $cervezas_estilo)
    {
        Comentario::create([
            'comentario' => $request->comentario,
            'commentable_type' => CervezasEstilo::class,
            'commentable_id' => $cervezas_estilo->estilo_id,
            'usuario_id' => 0, //TODO poner el usuario
        ]);

        session()->flash('statusTitle', 'Comentario Creado');
        session()->flash('statusMessage', 'El comentario fue creado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas_estilos.show', $cervezas_estilo);
    }

    public function destroy(CervezasEstilo $cervezas_estilo)
    {
        $cervezas_estilo->delete();
        session()->flash('statusTitle', 'Estilo Eliminado');
        session()->flash('statusMessage', 'El estilo de cervezas fue eliminado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas_estilos.index');
    }
}
