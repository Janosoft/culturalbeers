@extends('layouts.plantilla')
@section('title', 'Mostrar Color de Cerveza: ' . $cervezas_color->nombre)

@section('content')
    <h1>Contenido de {{ $cervezas_color }}</h1>
@endsection
