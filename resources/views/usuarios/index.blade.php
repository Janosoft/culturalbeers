@extends('layouts.plantilla')
@section('title', 'Mostrar Usuarios')

@section('content')
    <div class="container">
        <a href="{{ route('usuarios.create') }}">Crear Nuevo</a>
        <ul>
            @foreach ($usuarios as $usuario)
                <li><a href="{{ route('usuarios.show', $usuario) }}">{{ $usuario->email }}</a></li>
            @endforeach
        </ul>
        {{ $usuarios->links() }}
    </div>
@endsection
