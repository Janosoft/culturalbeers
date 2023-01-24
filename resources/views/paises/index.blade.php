@extends('layouts.plantilla')
@section('title', 'Mostrar Paises')

@section('content')
    <a href="{{ route('paises.create') }}">Crear Nuevo</a>
    <x-paises :paises="$paises" />
    {{ $paises->links() }}
@endsection
