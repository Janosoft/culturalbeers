@extends('layouts.plantilla')
@section('title', 'Mostrar Tipos de Envases')

@section('content')
    <div class="container">
        <a href="{{ route('cervezas_envases_tipos.create') }}">Crear Nuevo</a>
        <x-cervezas-envases-tipos :envases="$cervezas_envases_tipos" />
        {{ $cervezas_envases_tipos->links() }}
    </div>
@endsection
