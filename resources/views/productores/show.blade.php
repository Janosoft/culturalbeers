@extends('layouts.plantilla')
@section('title', 'Mostrar Color de Cerveza: ' . $productor->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $productor->nombre }}</h1>
            <h2><a href="{{ route('localidades.show', $productor->localidad) }}">{{ $productor->localidad->nombre }}</a></h2>
            <h2><a
                    href="{{ route('productores_fabricaciones.show', $productor->fabricacion) }}">{{ $productor->fabricacion->nombre }}</a>
            </h2>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a href="{{ route('productores.edit', $productor) }}" class="btn btn-primary" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
            <form class="form_destroy" action="{{ route('productores.destroy', $productor) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </div>

    <x-imagenes :imagenes="$productor->imagenes" />

    <x-cervezas :cervezas="$productor->cervezas" />

    <x-comentarios :comentarios="$productor->comentarios" />
    <x-formularios.comentario :action="route('productores.comment', $productor)" />

@endsection
