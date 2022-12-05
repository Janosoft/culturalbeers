@extends('layouts.plantilla')
@section('title', 'Mostrar Productores de Cervezas')

@section('content')
    <div class="container">
        <a href="{{ route('productores.create') }}">Crear Nuevo</a>
        <div class="list-group">
            @foreach ($productores as $productor)
                <a href="{{ route('productores.show', $productor) }}" class="list-group-item list-group-item-action">{{ $productor->nombre }}</a>
            @endforeach
        </div>
        {{ $productores->links() }}
    </div>
@endsection
