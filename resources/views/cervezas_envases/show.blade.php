@extends('layouts.plantilla')
@section('title', 'Mostrar Tipo de Envase: ' . $cervezas_envase)

@section('content')
    <h1>Contenido de {{ $cervezas_envase }}</h1>
@endsection
