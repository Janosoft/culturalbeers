@extends('layouts.plantilla')
@section('title', 'Mostrar Usuario: ' . $usuario->email)

@section('content')
    <h1>{{ $usuario->email }}</h1>
    <a href="{{ route('usuarios.index') }}"> Volver</a>
    <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-primary"> Editar</a>
    <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" style="display: inline;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger"> Eliminar</button>
    </form>
@endsection
