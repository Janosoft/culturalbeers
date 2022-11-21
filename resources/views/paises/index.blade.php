@extends('layouts.plantilla')
@section('title', 'Mostrar Paises')

@section('content')
    <div class="container">
        <a href="{{ route('paises.create') }}">Crear Nuevo</a>
        <ul>
            @foreach ($paises as $pais)
                <li><a href="{{ route('paises.show', $pais->pais_id) }}">{{ $pais->nombre }}</a></li>
            @endforeach
        </ul>
        {{ $paises->links() }}
    </div>
@endsection
