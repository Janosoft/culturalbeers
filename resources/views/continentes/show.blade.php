@extends('layouts.plantilla')
@section('title', 'Mostrar Continente: ' . $continente->nombre)

@section('content')
    <h1>{{ $continente->nombre }}</h1>
    <a href="{{ route('continentes.index') }}"> Volver</a>
    <a href="{{ route('continentes.edit', $continente) }}"> Editar</a>
@endsection