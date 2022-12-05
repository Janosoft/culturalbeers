@extends('layouts.plantilla')
@section('title', 'Mostrar Tipos de Fabricación')

@section('content')
    <div class="container">
        <a href="{{ route('productores_fabricaciones.create') }}">Crear Nuevo</a>
        <div class="list-group">
            @foreach ($productores_fabricaciones as $productores_fabricacion)
                <a href="{{ route('productores_fabricaciones.show', $productores_fabricacion) }}" class="list-group-item list-group-item-action">{{ $productores_fabricacion->nombre }}</a>                
            @endforeach
        </div>
        {{ $productores_fabricaciones->links() }}
    </div>
@endsection
