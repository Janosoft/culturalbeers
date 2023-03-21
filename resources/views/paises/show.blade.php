@extends('layouts.plantilla')
@section('title', 'Mostrar País: ' . $pais->nombre)

@section('content')
    <section class="pt-3 pt-lg-5 mb-3">
        <div class="row g-4 g-lg-5">
            <div class="col-lg-6">
                <img src="{{ empty($pais->imagen) ? 'https://dummyimage.com/561x631/000000/fff' : Storage::url($pais->imagen->url) }}" class="img-fluid rounded">
            </div>
            <div class="col-lg-6">
                <h1 class="mt-md-5">{{ $pais->nombre }}</h1>
                @if(!empty($pais->descripcion))<p class="mb-3">{{ $pais->descripcion }}</p>@endif
                <h2 class="mb-3"><x-links.continente :continente="$pais->continente" /></h2>
                <h4><x-links.division-politica-tipo :divisionpoliticatipo="$pais->division_politica_tipo" /></h4>
            </div>
        </div>
    </section>

    @auth
        <div class="row mb-3">
            <div class="col">
                <x-botones.editar :route="route('paises.edit', $pais)" />
                <x-botones.eliminar :route="route('paises.destroy', $pais)" />
            </div>
        </div>
    @endauth

    <x-imagenes :imagenes="$pais->imagenes" />

    <x-divisiones-politicas :divisiones="$pais->divisiones_politicas" />
@endsection
