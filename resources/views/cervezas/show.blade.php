@extends('layouts.plantilla')
@section('title', 'Mostrar Cerveza: ' . $cerveza->nombre)

@section('content')
    <div class="row mb-3">
        <div class="col-2">
            <img class="img-fluid" src="{{empty($cerveza->imagen) ? 'https://dummyimage.com/711x400/000000/fff' : Storage::url($cerveza->imagen->url)}}">
        </div>
        <div class="col">
            <h1>{{ $cerveza->nombre }}</h1>
            <h2><a href="{{ route('productores.show', $cerveza->productor) }}">{{ $cerveza->productor->nombre }}</a></h2>
            <h4>IBU: {{$cerveza->IBU}}</h4>
            <h4>ABV: {{$cerveza->ABV}}</h4>
            <h4>Color: <a href="{{ route('cervezas_colores.show', $cerveza->color) }}">{{ $cerveza->color->nombre }}</a></h4>
            <h4>Estilo: <a href="{{ route('cervezas_estilos.show', $cerveza->estilo) }}">{{ $cerveza->estilo->nombre }}</a></h4>
            <h4>Envases: </h4> <x-cervezas-envases-tipos :envases="$cerveza->envases" />
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('cervezas.edit', $cerveza) }}" class="btn btn-primary" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
            <form class="form_destroy" action="{{ route('cervezas.destroy', $cerveza) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </div>

    <x-imagenes :imagenes="$cerveza->imagenes" />
    
    <x-comentarios :comentarios="$cerveza->comentarios" />
    <x-formularios.comentario :route="route('cervezas.comment', $cerveza)" />

    <h2>Mismo Productor</h2>
    <x-cervezas :cervezas="$cerveza->cervezasMismoProductor()"/>
    
    <h2>Mismo Estilo</h2>
    <x-cervezas :cervezas="$cerveza->cervezasMismoEstilo()"/>
@endsection
