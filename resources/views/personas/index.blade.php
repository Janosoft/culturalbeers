@extends('layouts.plantilla')
@section('title', 'Mostrar Personas')

@section('content')
    <div class="container">
        <a href="{{ route('personas.create') }}">Crear Nueva</a>

        <x-personas :personas="$personas" />

        {{ $personas->links() }}
    </div>
@endsection
