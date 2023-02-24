<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function perfil()
    {
        $usuario= Auth::user();
        return view('usuarios.perfil', compact('usuario'));
    } 
}
