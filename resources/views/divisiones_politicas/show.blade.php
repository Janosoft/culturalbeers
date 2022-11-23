@extends('layouts.plantilla')
@section('title', 'Mostrar División Política: ' . $division_politica->nombre)

@section('content')
    <h1>Contenido de {{ $division_politica }}</h1>
@endsection
