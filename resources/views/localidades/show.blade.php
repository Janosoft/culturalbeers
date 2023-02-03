@extends('layouts.plantilla')
@section('title', 'Mostrar Localidad: ' . $localidad->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $localidad->nombre }}</h1>
            <h2><a
                    href="{{ route('divisiones_politicas.show', $localidad->division_politica) }}">{{ $localidad->division_politica->nombre }}</a>
            </h2>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <x-botones.editar :route="route('localidades.edit', $localidad)" />
            <x-botones.eliminar :route="route('localidades.destroy', $localidad)" />            
        </div>
    </div>

    <x-productores :productores="$localidad->productores" />

    <x-personas :personas="$localidad->personas" />

    <x-comentarios :comentarios="$localidad->comentarios" />
    <x-formularios.comentario :route="route('localidades.comment', $localidad)" />

@endsection
