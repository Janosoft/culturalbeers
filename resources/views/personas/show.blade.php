@extends('layouts.plantilla')
@section('title', 'Mostrar Persona: ' . $persona->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $persona->nombre . ' ' . $persona->apellido }}</h1>
            <h2><a href="{{ route('localidades.show', $persona->localidad) }}">{{ $persona->localidad->nombre }}</a></h2>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <x-botones.editar :route="route('personas.edit', $persona)" />
            <x-botones.eliminar :route="route('personas.destroy', $persona)" />
        </div>
    </div>

    <x-imagenes :imagenes="$persona->imagenes" />

@endsection
