@extends('layouts.plantilla')
@section('title', 'Mostrar Familia de Cervezas')

@section('content')
    <a href="{{ route('cervezas_familias.create') }}">Crear Nueva</a>
    <x-cervezas-familias :familias="$cervezas_familias" />
    {{ $cervezas_familias->links() }}
@endsection
