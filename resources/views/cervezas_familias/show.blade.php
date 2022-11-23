@extends('layouts.plantilla')
@section('title', 'Mostrar Familia de Cerveza: ' . $cervezas_familia->nombre)

@section('content')
    <h1>{{ $cervezas_familia->nombre }}</h1>
    <a href="{{ route('cervezas_familias.index') }}"> Volver</a>
    <a href="{{ route('cervezas_familias.edit', $cervezas_familia) }}"> Editar</a>
@endsection
