@extends('layouts.plantilla')
@section('title', 'Mostrar Color de Cerveza: ' . $productor->nombre)

@section('content')
    <h1>{{ $productor->nombre }}</h1>
    <a href="{{ route('productores.index') }}"> Volver</a>
    <a href="{{ route('productores.edit', $productor) }}"> Editar</a>
@endsection