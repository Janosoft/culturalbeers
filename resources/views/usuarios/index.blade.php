@extends('layouts.plantilla')
@section('title', 'Mostrar Usuarios')

@section('content')
    <div class="container">
        <ul>
            @foreach ($usuarios as $usuario)
                <li>{{ $usuario->email }}</li>
            @endforeach
        </ul>
        {{ $usuarios->links() }}
    </div>
@endsection