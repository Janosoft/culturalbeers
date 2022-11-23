@extends('layouts.plantilla')
@section('title', 'Mostrar Colores de Cervezas')

@section('content')
    <div class="container">
        <a href="{{ route('cervezas_colores.create') }}">Crear Nuevo</a>
        <ul>
            @foreach ($cervezas_colores as $cervezas_color)
                <li><a href="{{ route('cervezas_colores.show', $cervezas_color) }}">{{ $cervezas_color->nombre }}</a></li>
            @endforeach
        </ul>
        {{ $cervezas_colores->links() }}
    </div>
@endsection
