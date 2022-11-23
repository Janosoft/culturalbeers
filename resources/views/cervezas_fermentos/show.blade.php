@extends('layouts.plantilla')
@section('title', 'Mostrar Tipo de Fermento: ' . $cervezas_fermento->nombre)

@section('content')
    <h1>{{ $cervezas_fermento->nombre }}</h1>
    <a href="{{ route('cervezas_fermentos.index') }}"> Volver</a>
    <a href="{{ route('cervezas_fermentos.edit', $cervezas_fermento) }}"> Editar</a>
@endsection

