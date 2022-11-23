@extends('layouts.plantilla')
@section('title', 'Mostrar División Política: ' . $division_politica->nombre)

@section('content')
    <h1>{{ $division_politica->nombre }}</h1>
    <a href="{{ route('divisiones_politicas.index') }}"> Volver</a>
    <a href="{{ route('divisiones_politicas.edit', $division_politica) }}"> Editar</a>
@endsection