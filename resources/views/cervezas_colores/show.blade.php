@extends('layouts.plantilla')
@section('title', 'Mostrar Color de Cerveza: ' . $cervezas_color->nombre)

@section('content')
    <h1>{{ $cervezas_color->nombre }}</h1>
    <a href="{{ route('cervezas_colores.index') }}"> Volver</a>
    <a href="{{ route('cervezas_colores.edit', $cervezas_color) }}" class="btn btn-primary"> Editar</a>
    <form action="{{ route('cervezas_colores.destroy', $cervezas_color) }}" method="POST" style="display: inline;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger"> Eliminar</button>
    </form>
@endsection
