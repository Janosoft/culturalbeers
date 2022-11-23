@extends('layouts.plantilla')
@section('title', 'Mostrar Continente: ' . $continente->nombre)

@section('content')
    <h1>Contenido de {{ $continente }}</h1>
@endsection
