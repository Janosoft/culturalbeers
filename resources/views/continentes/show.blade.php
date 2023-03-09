@extends('layouts.plantilla')
@section('title', 'Mostrar Continente: ' . $continente->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $continente->nombre }}</h1>
        </div>
    </div>

    @auth
        <div class="row mb-3">
            <div class="col">
                <x-botones.editar :route="route('continentes.edit', $continente)" />
                <x-botones.eliminar :route="route('continentes.destroy', $continente)" />
            </div>
        </div>
    @endauth

    <x-paises :paises="$continente->paises" />
@endsection
