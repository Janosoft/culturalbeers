@extends('layouts.plantilla')
@section('title', 'Mostrar Localidad: ' . $localidad->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $localidad->nombre }}</h1>
            <h2><x-links.division-politica :divisionpolitica="$localidad->division_politica" /></h2>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <x-botones.editar :route="route('localidades.edit', $localidad)" />
            <x-botones.eliminar :route="route('localidades.destroy', $localidad)" />            
        </div>
    </div>

    <x-productores :productores="$localidad->productores" />

    <x-comentarios :comentarios="$localidad->comentarios" />
    <x-formularios.comentario :route="route('localidades.comment', $localidad)" />

@endsection
