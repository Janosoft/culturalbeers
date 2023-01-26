@extends('layouts.plantilla')
@section('title', 'Mostrar Localidad: ' . $localidad->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $localidad->nombre }}</h1>
            <h2><a
                    href="{{ route('divisiones_politicas.show', $localidad->division_politica) }}">{{ $localidad->division_politica->nombre }}</a>
            </h2>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('localidades.edit', $localidad) }}" class="btn btn-primary" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
            <form action="{{ route('localidades.destroy', $localidad) }}" method="POST" style="display: inline;">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </div>

    <x-productores :productores="$localidad->productores" />

    <x-personas :personas="$localidad->personas" />

    <x-comentarios :comentarios="$localidad->comentarios" />

    <form action="{{ route('localidades.comment', $localidad) }}" method="POST">
        @csrf
        
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="comentario" placeholder="Nuevo Comentario" value="{{ old('comentario') }}">
            <button class="btn btn-outline-primary" type="submit" title="Comentar"><i class="fa-solid fa-comment-medical"></i></button>
        </div>
    </form>
@endsection
