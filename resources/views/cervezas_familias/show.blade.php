@extends('layouts.plantilla')
@section('title', 'Mostrar Familia de Cerveza: ' . $cervezas_familia->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $cervezas_familia->nombre }}</h1>
            <h2><a
                    href="{{ route('cervezas_fermentos.show', $cervezas_familia->fermento) }}">{{ $cervezas_familia->fermento->nombre }}</a>
            </h2>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('cervezas_familias.edit', $cervezas_familia) }}" class="btn btn-primary" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
            <form action="{{ route('cervezas_familias.destroy', $cervezas_familia) }}" method="POST" style="display: inline;">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </div>

    <x-cervezas-estilos :estilos="$cervezas_familia->estilos" />

    <x-comentarios :comentarios="$cervezas_familia->comentarios" />

    <form action="{{ route('cervezas_familias.comment', $cervezas_familia) }}" method="POST">
        @csrf
        
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="comentario" placeholder="Nuevo Comentario" value="{{ old('comentario') }}">
            <button class="btn btn-outline-primary" type="submit" title="Comentar"><i class="fa-solid fa-comment-medical"></i></button>
        </div>
    </form>
@endsection
