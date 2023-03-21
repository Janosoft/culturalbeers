@extends('layouts.plantilla')
@section('title', 'Mostrar Productor: ' . $productor->nombre)

@section('content')
    <section class="pt-3 pt-lg-5 mb-3">
        <div class="row g-4 g-lg-5">
            <div class="col-lg-6">
                <img src="{{ empty($productor->imagen) ? 'https://dummyimage.com/561x631/000000/fff' : Storage::url($productor->imagen->url) }}" class="img-fluid rounded">
            </div>
            <div class="col-lg-6">
                <h1 class="mt-md-5">{{ $productor->nombre }} @if ($productor->verificado) <i class="bi bi-check-circle-fill text-warning"></i> @endif</h1>
                <h2 class="mb-3"><x-links.localidad :localidad="$productor->localidad" /></h2>
                <h4><x-links.productores-fabricacion :fabricacion="$productor->fabricacion" /></h4>
            </div>
        </div>
    </section>

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
