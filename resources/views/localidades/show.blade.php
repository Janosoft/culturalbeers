@extends('layouts.plantilla')
@section('title', 'Mostrar Localidad: '. $localidad->nombre)

@section('content')
    <h1>Contenido {{$localidad}}</h1>
@endsection