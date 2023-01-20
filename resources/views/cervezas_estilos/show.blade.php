@extends('layouts.plantilla')
@section('title', 'Mostrar Estilo de Cerveza: ' . $cervezas_estilo->nombre)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>{{ $cervezas_estilo->nombre }}</h1>
                <h2><a
                        href="{{ route('cervezas_familias.show', $cervezas_estilo->familia) }}">{{ $cervezas_estilo->familia->nombre }}</a>
                </h2>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <a href="{{ route('cervezas_estilos.edit', $cervezas_estilo) }}" class="btn btn-primary"> Editar</a>
                <form action="{{ route('cervezas_estilos.destroy', $cervezas_estilo) }}" method="POST"
                    style="display: inline;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"> Eliminar</button>
                </form>
            </div>
        </div>

        <x-cervezas :cervezas="$cervezas_estilo->cervezas" />

        <x-comentarios :comentarios="$cervezas_estilo->comentarios" />

        <form action="{{ route('cervezas_estilos.comment', $cervezas_estilo) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="comentario" class="form-label">Nuevo Comentario</label>
                <input type="text" class="form-control" name="comentario" placeholder="Comentario" value="{{ old('comentario') }}">
                @error('comentario')
                    <label for="floatingInputInvalid">*{{ $message }}</label>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Comentar</button>
            </div>
        </form>

    </div>
@endsection
