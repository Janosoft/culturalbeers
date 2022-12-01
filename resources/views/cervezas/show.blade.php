@extends('layouts.plantilla')
@section('title', 'Mostrar Cerveza: ' . $cerveza->nombre)

@section('content')
    <h1>{{ $cerveza->nombre }}</h1>
    <a href="{{ route('cervezas.index') }}"> Volver</a>
    <a href="{{ route('cervezas.edit', $cerveza) }}" class="btn btn-primary"> Editar</a>
    <form action="{{ route('cervezas.destroy', $cerveza) }}" method="POST" style="display: inline;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger"> Eliminar</button>
    </form>
@endsection
