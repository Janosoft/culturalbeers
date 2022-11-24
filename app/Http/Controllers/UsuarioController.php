<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\StoreUsuario;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('email')->paginate();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(StoreUsuario $request)
    {
        $usuario = new Usuario();
        $usuario->email = $request->email;
        $usuario->save();
        return redirect()->route('usuarios.show', $usuario);
    }

    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(StoreUsuario $request, Usuario $usuario)
    {
        $usuario->email = $request->email;
        $usuario->save();
        return redirect()->route('usuarios.show', $usuario);
    }
}
