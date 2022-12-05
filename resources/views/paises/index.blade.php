@extends('layouts.plantilla')
@section('title', 'Mostrar Paises')

@section('content')
    <div class="container">
        <a href="{{ route('paises.create') }}">Crear Nuevo</a>
        <div class="list-group">
            @foreach ($paises as $pais)
                <a href="{{ route('paises.show', $pais) }}" class="list-group-item list-group-item-action">{{ $pais->nombre }}</a>
            @endforeach
        </div>
        {{ $paises->links() }}
    </div>
@endsection
