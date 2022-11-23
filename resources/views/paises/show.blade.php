@extends('layouts.plantilla')
@section('title', 'Mostrar País: ' . $pais->nombre)

@section('content')
    <h1>{{ $pais->nombre }}</h1>
    <a href="{{ route('paises.index') }}"> Volver</a>
    <a href="{{ route('paises.edit', $pais) }}"> Editar</a>
@endsection
