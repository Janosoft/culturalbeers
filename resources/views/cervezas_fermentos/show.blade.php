@extends('layouts.plantilla')
@section('title', 'Mostrar Tipo de Fermento: ' . $cervezas_fermento)

@section('content')
    <h1>Contenido de {{ $cervezas_fermento }}</h1>
@endsection
