@extends('layouts.plantilla')
@section('title', 'Mostrar País: ' . $pais->nombre)

@section('content')
    <h1>Contenido de {{ $pais }}</h1>
@endsection
