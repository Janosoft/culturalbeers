@extends('layouts.plantilla')
@section('title', 'Mostrar Tipos de Fabricación')

@section('content')
    <a href="{{ route('productores_fabricaciones.create') }}">Crear Nuevo</a>
    <x-productores-fabricaciones :fabricaciones="$productores_fabricaciones" />
    {{ $productores_fabricaciones->links() }}
@endsection
