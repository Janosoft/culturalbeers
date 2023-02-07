@extends('layouts.plantilla')
@section('title', 'Mostrar Color de Cerveza: ' . $productor->nombre)

@section('content')
    <div class="row mb-3">
        <div class="col">
            <h1>{{ $productor->nombre }} @if ($productor->verificado) <i class="fa-solid fa-circle-check fa-2xs text-warning"></i> @endif</h1>
            <h2><a href="{{ route('localidades.show', $productor->localidad) }}">{{ $productor->localidad->nombre }}</a></h2>
            <h2><a href="{{ route('productores_fabricaciones.show', $productor->fabricacion) }}">{{ $productor->fabricacion->nombre }}</a></h2>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            
            @if (!$productor->verificado) <x-botones.accion :route="route('productores.verify', $productor)" title="Verificar" icon="fa-check-to-slot" />@endif
            <x-botones.editar :route="route('productores.edit', $productor)" />
            <x-botones.eliminar :route="route('productores.destroy', $productor)" />
        </div>
    </div>

    <x-imagenes :imagenes="$productor->imagenes" />

    <x-cervezas :cervezas="$productor->cervezas" />

    <x-comentarios :comentarios="$productor->comentarios" />
    <x-formularios.comentario :route="route('productores.comment', $productor)" />

@endsection
