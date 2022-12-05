@extends('layouts.plantilla')
@section('title', 'Mostrar Continentes')

@section('content')
    <div class="container">
        <a href="{{ route('continentes.create') }}">Crear Nuevo</a>
        <div class="list-group">
            @foreach ($continentes as $continente)
                <a href="{{ route('continentes.show', $continente) }}" class="list-group-item list-group-item-action">{{ $continente->nombre }}</a>
            @endforeach
        </div>
        {{ $continentes->links() }}
    </div>
@endsection
