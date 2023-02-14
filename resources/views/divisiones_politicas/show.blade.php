@extends('layouts.plantilla')
@section('title', 'Mostrar División Política: ' . $division_politica->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $division_politica->nombre }}</h1>
            <h2><a href="{{ route('paises.show', $division_politica->pais) }}">{{ $division_politica->pais->nombre }}</a>
            </h2>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <x-botones.editar :route="route('divisiones_politicas.edit', $division_politica)" />
            <x-botones.eliminar :route="route('divisiones_politicas.destroy', $division_politica)" />
        </div>
    </div>

    <x-localidades :localidades="$division_politica->localidades" />
@endsection
