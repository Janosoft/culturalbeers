@extends('layouts.plantilla')
@section('title', 'Mostrar Color de Cerveza: ' . $cervezas_color->nombre)

@section('content')
    <h1>{{ $cervezas_color->nombre }}</h1>
    <a href="{{ route('cervezas_colores.index') }}"> Volver</a>
    <a href="{{ route('cervezas_colores.edit', $cervezas_color) }}"> Editar</a>
@endsection
