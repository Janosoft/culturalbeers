<?php

namespace App\Http\Controllers;

use App\Models\Imagen;

class ImagenController extends Controller
{
    public function show(Imagen $imagen)
    {
        return view('imagenes.show', compact('imagen'));
    }
}
