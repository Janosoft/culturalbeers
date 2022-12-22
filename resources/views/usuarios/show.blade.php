@extends('layouts.plantilla')
@section('title', 'Mostrar Usuario')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1><a href="{{ route('personas.show', $usuario->persona) }}">{{ $usuario->persona->nombre }}</a>
                </h1>
                @if ($usuario->email_visible)
                    <h2>{{ $usuario->email }}</h2>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-primary"> Editar</a>
                <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"> Eliminar</button>
                </form>
            </div>
        </div>

    </div>
@endsection
