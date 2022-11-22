@extends('layouts.plantilla')
@section('title', 'Mostrar Familia de Cerveza: ' . $cervezas_familia)

@section('content')
    <h1>Contenido de {{ $cervezas_familia }}</h1>
@endsection
