@extends('layouts.plantilla')
@section('title', 'Mostrar Tipo de Fabricación: ' . $productores_fabricacion->nombre)

@section('content')
    <h1>Contenido de {{ $productores_fabricacion }}</h1>
@endsection
