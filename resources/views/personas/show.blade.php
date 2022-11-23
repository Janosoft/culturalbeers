@extends('layouts.plantilla')
@section('title', 'Mostrar Persona: ' . $persona->nombre)

@section('content')
    <h1>{{ $persona->nombre }}</h1>
    <a href="{{ route('personas.index') }}"> Volver</a>
    <a href="{{ route('personas.edit', $persona) }}"> Editar</a>
@endsection
