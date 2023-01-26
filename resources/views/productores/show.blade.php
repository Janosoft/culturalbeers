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
            <form action="{{ route('productores.destroy', $productor) }}" method="POST" style="display: inline;">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </div>

    <div class="row mb-3">
        @foreach ($productor->imagenes as $imagen)
            <div class="col">
                <img class="img-fluid" src="{{ Storage::url($imagen->url) }}">
            </div>
        @endforeach
    </div>

    <x-cervezas :cervezas="$productor->cervezas" />

    <x-comentarios :comentarios="$productor->comentarios" />

    <form action="{{ route('productores.comment', $productor) }}" method="POST">
        @csrf
        
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="comentario" placeholder="Nuevo Comentario" value="{{ old('comentario') }}">
            <button class="btn btn-outline-primary" type="submit" title="Comentar"><i class="fa-solid fa-comment-medical"></i></button>
        </div>
    </form>
@endsection
