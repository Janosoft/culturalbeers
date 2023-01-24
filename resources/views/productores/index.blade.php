@extends('layouts.plantilla')
@section('title', 'Mostrar Productores de Cervezas')

@section('content')
    <a href="{{ route('productores.create') }}">Crear Nuevo</a>
    <x-productores :productores="$productores" />
    {{ $productores->links() }}
@endsection
