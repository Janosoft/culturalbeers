<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Support\Facades\Redirect;

class ComentarioController extends Controller
{
    public function index()
    {
        $comentarios = Comentario::
            where('ofensivo', 1)
            ->where('autorizado', 0)
            ->orderBy('created_at','desc')
            ->paginate();

        return view('comentarios.index', compact('comentarios'));
    }

    public function offensive(Comentario $comentario)
    {
        $comentario->ofensivo= true;
        $comentario->save();

        session()->flash('statusTitle', 'Comentario Ofensivo');
        session()->flash('statusMessage', 'El comentario fue marcado como ofensivo correctamente.');
        session()->flash('statusColor', 'success');

        return Redirect::back();
    }

    public function authorized(Comentario $comentario)
    {
        $comentario->autorizado= true;
        $comentario->save();

        session()->flash('statusTitle', 'Comentario Autorizado');
        session()->flash('statusMessage', 'El comentario fue marcado como autorizado correctamente.');
        session()->flash('statusColor', 'success');

        return Redirect::back();
    }


    public function destroy(Comentario $comentario)
    {
        $comentario->delete();
        session()->flash('statusTitle', 'Comentario Eliminado');
        session()->flash('statusMessage', 'El comentario fue eliminado correctamente.');
        session()->flash('statusColor', 'success');

        return Redirect::back();
    }
}
