@extends('layouts.plantilla')
@section('title', 'Mostrar Productores de Cervezas')

@section('content')
    <div class="container">
        <a href="{{ route('productores.create') }}">Crear Nuevo</a>
        <ul>
            @foreach ($productores as $productor)
                <li><a href="{{ route('productores.show', $productor) }}">{{ $productor->nombre }}</a></li>
            @endforeach
        </ul>
        {{ $productores->links() }}
    </div>
@endsection
