@extends('layouts.plantilla')
@section('title', 'Mostrar Localidad: '. $localidad->nombre)

@section('content')
    <h1>{{ $localidad->nombre }}</h1>
    <a href="{{ route('localidades.index') }}"> Volver</a>
    <a href="{{ route('localidades.edit', $localidad) }}" class="btn btn-primary"> Editar</a>
    <form action="{{ route('localidades.destroy', $localidad) }}" method="POST" style="display: inline;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger"> Eliminar</button>
    </form>
@endsection
