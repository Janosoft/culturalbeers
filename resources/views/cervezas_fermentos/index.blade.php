@extends('layouts.plantilla')
@section('title', 'Mostrar Tipos de Fermentos')

@section('content')
    <a href="{{ route('cervezas_fermentos.create') }}">Crear Nuevo</a>
    <x-cervezas-fermentos :fermentos="$cervezas_fermentos" />
    {{ $cervezas_fermentos->links() }}
@endsection
