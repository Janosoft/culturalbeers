@extends('layouts.plantilla')
@section('title', 'Mostrar Personas')

@section('content')
    <div class="container">
        <a href="{{ route('personas.create') }}">Crear Nueva</a>
        <div class="list-group">
            @foreach ($personas as $persona)
                <a href="{{ route('personas.show', $persona) }}" class="list-group-item list-group-item-action">{{ $persona->nombre }}</a>
            @endforeach
        </div>
        {{ $personas->links() }}
    </div>
@endsection
