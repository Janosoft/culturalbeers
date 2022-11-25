@extends('layouts.plantilla')
@section('title', 'Mostrar Color de Cerveza: ' . $productor->nombre)

@section('content')
    <h1>{{ $productor->nombre }}</h1>
    <a href="{{ route('productores.index') }}"> Volver</a>
    <a href="{{ route('productores.edit', $productor) }}" class="btn btn-primary"> Editar</a>
    <form action="{{ route('productores.destroy', $productor) }}" method="POST" style="display: inline;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger"> Eliminar</button>
    </form>
@endsection