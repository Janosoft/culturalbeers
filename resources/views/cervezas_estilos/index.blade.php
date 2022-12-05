@extends('layouts.plantilla')
@section('title', 'Mostrar Estilos de Cervezas')

@section('content')
    <div class="container">
        <a href="{{ route('cervezas_estilos.create') }}">Crear Nuevo</a>
        <div class="list-group">
            @foreach ($cervezas_estilos as $cervezas_estilo)
                <a href="{{ route('cervezas_estilos.show', $cervezas_estilo) }}" class="list-group-item list-group-item-action">{{ $cervezas_estilo->nombre }}</a>
            @endforeach
        </div>
        {{ $cervezas_estilos->links() }}
    </div>
@endsection
