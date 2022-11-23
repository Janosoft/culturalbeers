@extends('layouts.plantilla')
@section('title', 'Mostrar Tipo de Fabricación: ' . $productores_fabricacion->nombre)

@section('content')
    <h1>{{ $productores_fabricacion->nombre }}</h1>
    <a href="{{ route('productores_fabricaciones.index') }}"> Volver</a>
    <a href="{{ route('productores_fabricaciones.edit', $productores_fabricacion) }}"> Editar</a>
@endsection
