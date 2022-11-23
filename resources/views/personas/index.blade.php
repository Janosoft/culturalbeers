@extends('layouts.plantilla')
@section('title', 'Mostrar Personas')

@section('content')
    <div class="container">
        <a href="{{ route('personas.create') }}">Crear Nueva</a>
        <ul>
            @foreach ($personas as $persona)
                <li><a href="{{ route('personas.show', $persona) }}">{{ $persona->nombre }}</a></li>
            @endforeach
        </ul>
        {{ $personas->links() }}
    </div>
@endsection
