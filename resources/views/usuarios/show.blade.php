@extends('layouts.plantilla')
@section('title', 'Mostrar Usuario: ' . $usuario->email)

@section('content')
    <h1>{{ $usuario->email }}</h1>
    <a href="{{ route('usuarios.index') }}"> Volver</a>
    <a href="{{ route('usuarios.edit', $usuario) }}"> Editar</a>
@endsection
