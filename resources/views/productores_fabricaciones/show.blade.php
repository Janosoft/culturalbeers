@extends('layouts.plantilla')
@section('title', 'Mostrar Tipo de Fabricación: ' . $productores_fabricacion->nombre)

@section('content')
    <h1>{{ $productores_fabricacion->nombre }}</h1>
    <a href="{{ route('productores_fabricaciones.index') }}"> Volver</a>
    <a href="{{ route('productores_fabricaciones.edit', $productores_fabricacion) }}" class="btn btn-primary"> Editar</a>
    <form action="{{ route('productores_fabricaciones.destroy', $productores_fabricacion) }}" method="POST" style="display: inline;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger"> Eliminar</button>
    </form>
@endsection
