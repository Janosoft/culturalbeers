@extends('layouts.plantilla')
@section('title', 'Mostrar Familia de Cerveza: ' . $cerveza_familia)

@section('content')
    <h1>Contenido de {{ $cerveza_familia }}</h1>
@endsection
