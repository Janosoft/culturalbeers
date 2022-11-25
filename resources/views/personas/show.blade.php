@extends('layouts.plantilla')
@section('title', 'Mostrar Persona: ' . $persona->nombre)

@section('content')
    <h1>{{ $persona->nombre }}</h1>
    <a href="{{ route('personas.index') }}"> Volver</a>
    <a href="{{ route('personas.edit', $persona) }}" class="btn btn-primary"> Editar</a>
    <form action="{{ route('personas.destroy', $persona) }}" method="POST" style="display: inline;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger"> Eliminar</button>
    </form>
@endsection
