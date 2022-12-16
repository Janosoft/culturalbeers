<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\StoreUsuario;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('slug')->paginate();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(StoreUsuario $request)
    {
        $request['slug'] = md5($request->email);
        $usuario = Usuario::create($request->all());
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
        $request['slug'] = md5($request->email);
        $usuario->update($request->all());
        return redirect()->route('usuarios.show', $usuario);
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index');
    }
}
