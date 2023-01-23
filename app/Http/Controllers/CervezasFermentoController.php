<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCervezaFermento;
use App\Http\Requests\StoreComentario;
use App\Models\CervezasFermento;
use App\Models\Comentario;

class CervezasFermentoController extends Controller
{
    public function index()
    {
        $cervezas_fermentos = CervezasFermento::orderBy('nombre')->paginate();

        return view('cervezas_fermentos.index', compact('cervezas_fermentos'));
    }

    public function create()
    {
        return view('cervezas_fermentos.create');
    }

    public function store(StoreCervezaFermento $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $cervezas_fermento = CervezasFermento::create($request->all());

        return redirect()->route('cervezas_fermentos.show', $cervezas_fermento);
    }

    public function show(CervezasFermento $cervezas_fermento)
    {
        return view('cervezas_fermentos.show', compact('cervezas_fermento'));
    }

    public function edit(CervezasFermento $cervezas_fermento)
    {
        return view('cervezas_fermentos.edit', compact('cervezas_fermento'));
    }

    public function update(StoreCervezaFermento $request, CervezasFermento $cervezas_fermento)
    {
        $request['slug'] = str()->slug($request->nombre);
        $cervezas_fermento->update($request->all());
        session()->flash('statusTitle', 'Fermento Creado');
        session()->flash('statusMessage', 'El fermento fue creado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas_fermentos.show', $cervezas_fermento);
    }

    public function comment(StoreComentario $request, CervezasFermento $cervezas_fermento)
    {
        Comentario::create([
            'comentario' => $request->comentario,
            'commentable_type' => CervezasFermento::class,
            'commentable_id' => $cervezas_fermento->fermento_id,
            'usuario_id' => 0, //TODO poner el usuario
        ]);

        session()->flash('statusTitle', 'Comentario Creado');
        session()->flash('statusMessage', 'El comentario fue creado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas_fermentos.show', $cervezas_fermento);
    }

    public function destroy(CervezasFermento $cervezas_fermento)
    {
        $cervezas_fermento->delete();
        session()->flash('statusTitle', 'Fermento Eliminado');
        session()->flash('statusMessage', 'El fermento fue eliminado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas_fermentos.index');
    }
}
