@extends('layouts.plantilla')
@section('title', 'Mostrar Usuario: ' . $usuario->nombre)

@section('content')
    <h1>Contenido {{ $usuario }}</h1>
@endsection
