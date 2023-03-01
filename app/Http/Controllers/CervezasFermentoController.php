<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCervezaFermento;
use App\Http\Requests\StoreComentario;
use App\Models\CervezasFermento;
use App\Models\Comentario;
use Illuminate\Support\Facades\Auth;

class CervezasFermentoController extends Controller
{
    public function index()
    {
        $cervezas_fermentos = CervezasFermento::withTrashed()
            ->orderBy('deleted_at')
            ->orderBy('nombre')
            ->paginate();

        return view('cervezas_fermentos.index', compact('cervezas_fermentos'));
    }

    public function create()
    {
        return view('cervezas_fermentos.create');
    }

    public function store(StoreCervezaFermento $request)
    {
        $request['slug'] = str()->slug($request->nombre);
        $request['user_id'] = Auth::user()->user_id;
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
            'user_id' => Auth::user()->user_id,
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

    public function forcedelete(int $fermento_id)
    {
        $cervezas_fermento = CervezasFermento::withTrashed()->find($fermento_id);
        $cervezas_fermento->loadCount('familias');
        if ($cervezas_fermento->familias_count == 0) {
            $cervezas_fermento->familias()->forceDelete();
            $cervezas_fermento->forceDelete();
            session()->flash('statusTitle', 'Fermento Eliminado');
            session()->flash('statusMessage', 'El fermento fue eliminado correctamente.');
            session()->flash('statusColor', 'success');
        }
        else
        {
            session()->flash('statusTitle', 'Error al eliminar Fermento');
            session()->flash('statusMessage', 'El fermento está siendo utilizado en al menos una familia de cervezas.');
            session()->flash('statusColor', 'danger');
        }

        return redirect()->route('cervezas_fermentos.index');
    }

    public function restore(int $fermento_id)
    {
        CervezasFermento::withTrashed()->find($fermento_id)->restore();
        session()->flash('statusTitle', 'Fermento Restaurado');
        session()->flash('statusMessage', 'El fermento fue restaurado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('cervezas_fermentos.index');
    }
}
