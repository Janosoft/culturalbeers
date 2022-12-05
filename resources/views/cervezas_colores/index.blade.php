@extends('layouts.plantilla')
@section('title', 'Mostrar Colores de Cervezas')

@section('content')
    <div class="container">
        <a href="{{ route('cervezas_colores.create') }}">Crear Nuevo</a>
        <div class="list-group">
            @foreach ($cervezas_colores as $cervezas_color)
                <a href="{{ route('cervezas_colores.show', $cervezas_color) }}" class="list-group-item list-group-item-action">{{ $cervezas_color->nombre }}</a>
            @endforeach
        </div>
        {{ $cervezas_colores->links() }}
    </div>
@endsection
