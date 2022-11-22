@extends('layouts.plantilla')
@section('title', 'Mostrar Tipo de Fabricación: ' . $cervezas_fabricacion)

@section('content')
    <h1>Contenido de {{ $cervezas_fabricacion }}</h1>
@endsection
