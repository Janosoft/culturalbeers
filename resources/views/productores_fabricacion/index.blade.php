@extends('layouts.plantilla')
@section('title', 'Mostrar Tipos de Fabricación')

@section('content')
    <div class="container">
        <a href="{{ route('productores_fabricaciones.create') }}">Crear Nuevo</a>
        <ul>
            @foreach ($productores_fabricaciones as $productores_fabricacion)
                <li><a href="{{ route('productores_fabricaciones.show', $productores_fabricacion->fabricacion_id) }}">{{ $productores_fabricacion->nombre }}</a></li>
            @endforeach
        </ul>
        {{ $productores_fabricaciones->links() }}
    </div>
@endsection
