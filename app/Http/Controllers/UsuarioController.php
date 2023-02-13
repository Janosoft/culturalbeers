<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuario;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function account()
    {
        $usuario = Usuario::first();

        return view('usuarios.account', compact('usuario'));
    }

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
        $request['slug'] = md5($request->email);
        $usuario = Usuario::create($request->all());
        session()->flash('statusTitle', 'Usuario Creado');
        session()->flash('statusMessage', 'El usuario fue creado correctamente.');
        session()->flash('statusColor', 'success');

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
        session()->flash('statusTitle', 'Usuario Actualizado');
        session()->flash('statusMessage', 'El usuario fue actualizado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('usuarios.show', $usuario);
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        session()->flash('statusTitle', 'Usuario Eliminado');
        session()->flash('statusMessage', 'El usuario fue eliminado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('usuarios.index');
    }
}
