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
            <a href="{{ route('personas.edit', $persona) }}" class="btn btn-primary" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
            <form class="form_destroy" action="{{ route('personas.destroy', $persona) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </div>

    <x-imagenes :imagenes="$persona->imagenes" />

@endsection
