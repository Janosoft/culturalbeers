@extends('layouts.plantilla')
@section('title', 'Mostrar Color de Cerveza: ' . $productor->nombre)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>{{ $productor->nombre }}</h1>
                <h2>{{ $productor->localidad->nombre }}</h2>
                <h2>{{ $productor->fabricacion->nombre }}</h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="{{ route('productores.index') }}"> Volver</a>
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
                <ul>
                    @foreach ($productor->cervezas as $cerveza)
                        <div class="col">
                            <li><a href="{{ route('cervezas.show', $cerveza) }}">{{ $cerveza->nombre }}</a></li>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
@endsection
