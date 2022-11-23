@extends('layouts.plantilla')
@section('title', 'Mostrar Localidad: '. $localidad->nombre)

@section('content')
    <h1>{{ $localidad->nombre }}</h1>
    <a href="{{ route('localidades.index') }}"> Volver</a>
    <a href="{{ route('localidades.edit', $localidad) }}"> Editar</a>
@endsection
