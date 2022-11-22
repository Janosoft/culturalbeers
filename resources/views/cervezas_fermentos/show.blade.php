@extends('layouts.plantilla')
@section('title', 'Mostrar Tipo de Fermento: ' . $cerveza_familia)

@section('content')
    <h1>Contenido de {{ $cerveza_familia }}</h1>
@endsection
