@extends('layouts.plantilla')
@section('title', 'Mostrar Color de Cerveza: ' . $productor->nombre)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>{{ $productor->nombre }}</h1>
                <h2><a href="{{ route('localidades.show', $productor->localidad) }}">{{ $productor->localidad->nombre }}</a></h2>
                <h2><a href="{{ route('productores_fabricaciones.show', $productor->fabricacion) }}">{{ $productor->fabricacion->nombre }}</a></h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="{{ route('productores.edit', $productor) }}" class="btn btn-primary"> Editar</a>
                <form action="{{ route('productores.destroy', $productor) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"> Eliminar</button>
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

        <div class="row mb-3">
            <div class="col">
                <div class="list-group">
                    @foreach ($productor->cervezas as $cerveza)
                        <a href="{{ route('cervezas.show', $cerveza) }}" class="list-group-item list-group-item-action">{{ $cerveza->nombre }}</a>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
