@extends('layouts.plantilla')
@section('title', 'Mostrar Cerveza: ' . $cerveza->nombre)

@section('content')
    <h1>Contenido de {{ $cerveza }}</h1>
@endsection
