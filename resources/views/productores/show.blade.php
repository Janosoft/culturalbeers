@extends('layouts.plantilla')
@section('title', 'Mostrar Color de Cerveza: ' . $productor->nombre)

@section('content')
    <div class="row mb-3">
        <div class="col">
            <h1>{{ $productor->nombre }} @if ($productor->verificado) <i class="bi bi-check-circle-fill text-warning"></i> @endif</h1>
            <h2><x-links.localidad :localidad="$productor->localidad" /></h2>
            <h2><x-links.productores-fabricacion :fabricacion="$productor->fabricacion" /></h2>
        </div>
    </div>

    @auth
        <div class="row mb-3">
            <div class="col">                
                @if (!$productor->verificado) <x-botones.accion :route="route('productores.verify', $productor)" title="Verificar" color="btn-warning" icon="bi bi-check2-square" />@endif
                <x-botones.editar :route="route('productores.edit', $productor)" />
                <x-botones.eliminar :route="route('productores.destroy', $productor)" />
            </div>
        </div>
    @endauth

    <x-imagenes :imagenes="$productor->imagenes" />

    <x-cervezas :cervezas="$productor->cervezas" />

    <x-comentarios :comentarios="$productor->comentarios" />
    @auth
        <x-formularios.comentario :route="route('productores.comment', $productor)" />
    @endauth

@endsection
