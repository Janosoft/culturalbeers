@extends('layouts.plantilla')
@section('title', 'Mostrar Lugar: ' . $lugar->nombre)

@section('content')
    <section class="pt-3 pt-lg-5 mb-3">
        <div class="row g-4 g-lg-5">
            <div class="col-lg-6">
                <img src="{{ empty($lugar->imagen) ? 'https://dummyimage.com/561x631/000000/fff' : Storage::url($lugar->imagen->url) }}" class="img-fluid rounded">
            </div>
            <div class="col-lg-6">
                <h1 class="mt-md-5">{{ $lugar->nombre }} @if ($lugar->verificado) <i class="bi bi-check-circle-fill text-warning"></i> @endif</h1>
                @if(!empty($lugar->descripcion))<p class="mb-3">{{ $lugar->descripcion }}</p>@endif
                <h2 class="mb-3"><x-links.localidad :localidad="$lugar->localidad" /></h2>
                <h4>{{ $lugar->direccion }}</h4>
                <h4><x-links.lugares-categoria :categoria="$lugar->categoria" /></h4>
            </div>
        </div>
    </section>

    @auth
        <div class="row mb-3">
            <div class="col">
                @if (!$lugar->verificado) <x-botones.accion :route="route('lugares.verify', $lugar)" title="Verificar" color="btn-warning" icon="bi bi-check2-square" />@endif
                <x-botones.editar :route="route('lugares.edit', $lugar)" />
                <x-botones.eliminar :route="route('lugares.destroy', $lugar)" />            
            </div>
        </div>
    @endauth

    <x-comentarios :comentarios="$lugar->comentarios" />
    @auth
        <x-formularios.comentario :route="route('lugares.comment', $lugar)" />
    @endauth

@endsection
