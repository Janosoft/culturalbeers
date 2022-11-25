@extends('layouts.plantilla')
@section('title', 'Mostrar País: ' . $pais->nombre)

@section('content')
    <h1>{{ $pais->nombre }}</h1>
    <a href="{{ route('paises.index') }}"> Volver</a>
    <a href="{{ route('paises.edit', $pais) }}" class="btn btn-primary"> Editar</a>
    <form action="{{ route('paises.destroy', $pais) }}" method="POST" style="display: inline;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger"> Eliminar</button>
    </form>
@endsection
