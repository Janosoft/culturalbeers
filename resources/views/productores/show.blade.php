@extends('layouts.plantilla')
@section('title', 'Mostrar Color de Cerveza: ' . $cerveza_color)

@section('content')
    <h1>Contenido de {{ $cervezas_color }}</h1>
@endsection
