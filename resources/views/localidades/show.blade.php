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
            <a href="{{ route('localidades.edit', $localidad) }}" class="btn btn-primary"> Editar</a>
            <form action="{{ route('localidades.destroy', $localidad) }}" method="POST" style="display: inline;">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger"> Eliminar</button>
            </form>
        </div>
    </div>

    <x-productores :productores="$localidad->productores" />

    <x-personas :personas="$localidad->personas" />

    <x-comentarios :comentarios="$localidad->comentarios" />

    <form action="{{ route('localidades.comment', $localidad) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="comentario" class="form-label">Nuevo Comentario</label>
            <input type="text" class="form-control" name="comentario" placeholder="Comentario"
                value="{{ old('comentario') }}">
            @error('comentario')
                <label for="floatingInputInvalid">*{{ $message }}</label>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Comentar</button>
        </div>
    </form>
@endsection
