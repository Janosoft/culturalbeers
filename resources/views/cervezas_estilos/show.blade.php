@extends('layouts.plantilla')
@section('title', 'Mostrar Estilo de Cerveza: ' . $cervezas_estilo)

@section('content')
    <h1>Contenido de {{ $cervezas_estilo }}</h1>
@endsection