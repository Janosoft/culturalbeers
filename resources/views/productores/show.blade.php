@extends('layouts.plantilla')
@section('title', 'Mostrar Color de Cerveza: ' . $productor->nombre)

@section('content')
    <h1>Contenido de {{ $productor }}</h1>
@endsection
