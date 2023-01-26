@extends('layouts.plantilla')
@section('title', 'Mostrar Usuarios')

@section('content')

    <div class="list-group">
        @foreach ($usuarios as $usuario)
            <a href="{{ route('usuarios.show', $usuario) }}"
                class="list-group-item list-group-item-action">{{ $usuario->persona->nombre }}</a>
        @endforeach
    </div>
    {{ $usuarios->links() }}
@endsection
