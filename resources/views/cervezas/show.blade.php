@extends('layouts.plantilla')
@section('title', 'Mostrar Cerveza: ' . $cerveza->nombre)

@section('content')
    <section class="pt-3 pt-lg-5 mb-3">
        <div class="row g-4 g-lg-5">
            <div class="col-lg-6">
                <img src="{{ empty($cerveza->imagen) ? 'https://dummyimage.com/561x631/000000/fff' : Storage::url($cerveza->imagen->url) }}" class="img-fluid rounded">
            </div>
            <div class="col-lg-6">
                <h1 class="mt-md-5">{{ $cerveza->nombre }}</h1>
                <h2 class="mb-3"><x-links.productor :productor="$cerveza->productor" /></h2>
                @if(!empty($cerveza->descripcion))<p class="mb-3">{{ $cerveza->descripcion }}</p>@endif
                <h4>IBU: {{ $cerveza->IBU }}</h4>
                <h4>ABV: {{ $cerveza->ABV }}%</h4>
                <h4>Color: <x-links.cervezas-color :color="$cerveza->color" /></h4>
                <h4>Estilo: <x-links.cervezas-estilo :estilo="$cerveza->estilo" /></h4>
                <h4>Envases: </h4>
                <x-cervezas-envases-tipos :envases="$cerveza->envases" />
            </div>
        </div>
    </section>

    <div class="row mb-3">
        <div class="col-2">
            @auth
                <div class="row mb-3 text-center">
                    <div class="col">
                        <x-botones.editar :route="route('cervezas.edit', $cerveza)" />
                        <x-botones.eliminar :route="route('cervezas.destroy', $cerveza)" />
                        @if ($cerveza->probada())
                            <x-botones.accion :route="route('cervezas.untaste', $cerveza)" title="No la probé" color="btn-danger"
                                icon="bi bi-person-dash" />
                        @else
                            <x-botones.accion :route="route('cervezas.taste', $cerveza)" title="La probé" color="btn-warning"
                                icon="bi bi-person-check" />
                        @endif
                        @if ($cerveza->seguida())
                            <x-botones.accion :route="route('cervezas.unfollow', $cerveza)" title="Dejar de Seguir" color="btn-danger"
                                icon="bi bi-heart" />
                        @else
                            <x-botones.accion :route="route('cervezas.follow', $cerveza)" title="Seguir" color="btn-warning"
                                icon="bi bi-heart-fill" />
                        @endif
                    </div>
                </div>
                @if ($cerveza->probada())
                    <div class="row mb-3">
                        <div class="col">
                            <x-input.starsrating :route="route('cervezas.rate', $cerveza)" :puntaje="$cerveza->puntaje_usuario()" />
                        </div>
                    </div>
                @endif
            @endauth

        </div>

    </div>

    <x-imagenes :imagenes="$cerveza->imagenes" />

    <x-comentarios :comentarios="$cerveza->comentarios" />
    @auth
        <x-formularios.comentario :route="route('cervezas.comment', $cerveza)" />
    @endauth

    <h2>Mismo Productor</h2>
    <x-cervezas :cervezas="$cerveza->cervezasMismoProductor()" />

    <h2>Mismo Estilo</h2>
    <x-cervezas :cervezas="$cerveza->cervezasMismoEstilo()" />
@endsection
