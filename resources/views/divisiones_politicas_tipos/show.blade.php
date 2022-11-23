@extends('layouts.plantilla')
@section('title', 'Mostrar Divisiones Políticas Tipo: ' . $division_politica_tipo->nombre)

@section('content')
    <h1>Contenido de {{ $division_politica_tipo }}</h1>
@endsection
