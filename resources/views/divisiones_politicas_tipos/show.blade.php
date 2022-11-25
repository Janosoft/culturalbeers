@extends('layouts.plantilla')
@section('title', 'Mostrar Divisiones Políticas Tipo: ' . $division_politica_tipo->nombre)

@section('content')
    <h1>{{ $division_politica_tipo->nombre }}</h1>
    <a href="{{ route('divisiones_politicas_tipos.index') }}"> Volver</a>
    <a href="{{ route('divisiones_politicas_tipos.edit', $division_politica_tipo) }}" class="btn btn-primary"> Editar</a>
    <form action="{{ route('divisiones_politicas_tipos.destroy', $division_politica_tipo) }}" method="POST" style="display: inline;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger"> Eliminar</button>
    </form>
@endsection
