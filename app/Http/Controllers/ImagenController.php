<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Support\Facades\Redirect;

class ImagenController extends Controller
{
    public function index()
    {
        $imagenes = Imagen::where('ofensiva', 1)
            ->where('autorizada', 0)
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('imagenes.index', compact('imagenes'));
    }

    public function show(Imagen $imagen)
    {
        return view('imagenes.show', compact('imagen'));
    }

    public function offensive(Imagen $imagen)
    {
        $imagen->ofensiva = true;
        $imagen->save();

        session()->flash('statusTitle', 'Imagen Ofensiva');
        session()->flash('statusMessage', 'La imagen fue marcada como ofensiva correctamente.');
        session()->flash('statusColor', 'success');

        return Redirect::back();
    }

    public function authorized(Imagen $imagen)
    {
        $imagen->autorizada = true;
        $imagen->save();

        session()->flash('statusTitle', 'Imagen Autorizada');
        session()->flash('statusMessage', 'La imagen fue marcada como autorizada correctamente.');
        session()->flash('statusColor', 'success');

        return Redirect::back();
    }

    public function destroy(Imagen $imagen)
    {
        $imagen->delete();
        session()->flash('statusTitle', 'Imagen Eliminada');
        session()->flash('statusMessage', 'La imagen fue eliminada correctamente.');
        session()->flash('statusColor', 'success');

        return Redirect::back();
    }
}
