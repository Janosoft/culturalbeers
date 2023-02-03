@extends('layouts.plantilla')
@section('title', 'Mostrar Usuario')

@section('content')
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
            <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-primary" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
            <form class="form_destroy" action="{{ route('usuarios.destroy', $usuario) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </div>
@endsection
