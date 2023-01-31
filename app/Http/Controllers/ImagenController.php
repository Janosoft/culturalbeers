<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    public function show(Imagen $imagen)
    {
        return view('imagenes.show', compact('imagen'));
    }
}
