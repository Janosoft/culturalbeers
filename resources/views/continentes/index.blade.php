@extends('layouts.plantilla')
@section('title', 'Mostrar Continentes')

@section('content')
    <div class="container">
        <a href="{{ route('continentes.create') }}">Crear Nuevo</a>
        <ul>
            @foreach ($continentes as $continente)
                <li><a href="{{ route('continentes.show', $continente->continente_id) }}">{{ $continente->nombre }}</a></li>
            @endforeach
        </ul>
        {{ $continentes->links() }}
    </div>
@endsection
