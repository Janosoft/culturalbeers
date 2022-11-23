@extends('layouts.plantilla')
@section('title', 'Mostrar Divisiones Políticas Tipo: ' . $division_politica_tipo->nombre)

@section('content')
    <h1>{{ $division_politica_tipo->nombre }}</h1>
    <a href="{{ route('divisiones_politicas_tipos.index') }}"> Volver</a>
    <a href="{{ route('divisiones_politicas_tipos.edit', $division_politica_tipo) }}"> Editar</a>
@endsection
