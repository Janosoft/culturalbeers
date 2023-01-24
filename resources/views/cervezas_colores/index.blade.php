@extends('layouts.plantilla')
@section('title', 'Mostrar Colores de Cervezas')

@section('content')
    <div class="container">
        <a href="{{ route('cervezas_colores.create') }}">Crear Nuevo</a>
        <x-cervezas-colores :colores="$cervezas_colores"/>
        {{ $cervezas_colores->links() }}
    </div>
@endsection
