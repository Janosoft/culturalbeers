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
            <x-botones.editar :route="route('usuarios.edit', $usuario)" />
            <x-botones.eliminar :route="route('usuarios.destroy', $usuario)" />
        </div>
    </div>
@endsection
