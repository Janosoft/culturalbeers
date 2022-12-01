@extends('layouts.plantilla')
@section('title', 'Mostrar Continente: ' . $continente->nombre)

@section('content')
    <h1>{{ $continente->nombre }}</h1>
    <a href="{{ route('continentes.index') }}"> Volver</a>
    <a href="{{ route('continentes.edit', $continente) }}" class="btn btn-primary"> Editar</a>
    <form action="{{ route('continentes.destroy', $continente) }}" method="POST" style="display: inline;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger"> Eliminar</button>
    </form>
@endsection