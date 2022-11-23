@extends('layouts.plantilla')
@section('title', 'Mostrar Cerveza: ' . $cerveza->nombre)

@section('content')
    <h1>{{ $cerveza->nombre }}</h1>
    <a href="{{ route('cervezas.index') }}"> Volver</a>
    <a href="{{ route('cervezas.edit', $cervezas) }}"> Editar</a>
@endsection
