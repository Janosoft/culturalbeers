@extends('layouts.plantilla')
@section('title', 'Mostrar Tipo de Envase: ' . $cervezas_envase_tipo->nombre)

@section('content')
    <h1>{{ $cervezas_envase_tipo->nombre }}</h1>
    <a href="{{ route('cervezas_envases_tipos.index') }}"> Volver</a>
    <a href="{{ route('cervezas_envases_tipos.edit', $cervezas_envase_tipo) }}"> Editar</a>
@endsection
