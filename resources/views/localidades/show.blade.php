@extends('layouts.plantilla')
@section('title', 'Mostrar Localidad: ' . $localidad->nombre)

@section('content')
    <section class="pt-3 pt-lg-5 mb-3">
        <div class="row g-4 g-lg-5">
            <div class="col-lg-6">
                <img src="{{ empty($localidad->imagen) ? 'https://dummyimage.com/561x631/000000/fff' : Storage::url($localidad->imagen->url) }}" class="img-fluid rounded">
            </div>
            <div class="col-lg-6">
                <h1 class="mt-md-5">{{ $localidad->nombre }}</h1>
                @if(!empty($localidad->descripcion))<p class="mb-3">{{ $localidad->descripcion }}</p>@endif
                <h2 class="mb-3"><x-links.division-politica :divisionpolitica="$localidad->division_politica" /></h2>
            </div>
        </div>
    </section>

    @auth
        <div class="row mb-3">
            <div class="col">
                <x-botones.editar :route="route('localidades.edit', $localidad)" />
                <x-botones.eliminar :route="route('localidades.destroy', $localidad)" />            
            </div>
        </div>
    @endauth

    <x-productores :productores="$localidad->productores" />

    <x-comentarios :comentarios="$localidad->comentarios" />
    @auth
        <x-formularios.comentario :route="route('localidades.comment', $localidad)" />
    @endauth

@endsection
