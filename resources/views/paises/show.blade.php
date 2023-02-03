@extends('layouts.plantilla')
@section('title', 'Mostrar País: ' . $pais->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $pais->nombre }}</h1>
            <h2><a href="{{ route('continentes.show', $pais->continente) }}">{{ $pais->continente->nombre }}</a></h2>
            <h2><a href="{{ route('divisiones_politicas_tipos.show', $pais->division_politica_tipo) }}">{{ $pais->division_politica_tipo->nombre }}</a></h2>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <x-botones.editar :route="route('paises.edit', $pais)" />
            <x-botones.eliminar :route="route('paises.destroy', $pais)" />
        </div>
    </div>

    <x-imagenes :imagenes="$pais->imagenes" />

    <x-divisiones-politicas :divisiones="$pais->divisiones_politicas" />
@endsection
