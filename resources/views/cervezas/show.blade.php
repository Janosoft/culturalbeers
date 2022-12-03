@extends('layouts.plantilla')
@section('title', 'Mostrar Cerveza: ' . $cerveza->nombre)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>{{ $cerveza->nombre }}</h1>
                <h2>{{ $cerveza->productor->nombre }}</h2>
                <h4>Color: {{ $cerveza->color->nombre }}</h4>
                <h4>Estilo: {{ $cerveza->estilo->nombre }}</h4>
                <h4>Tipo de Envase: {{ $cerveza->envase->nombre }}</h4>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <a href="{{ route('cervezas.index') }}"> Volver</a>
                <a href="{{ route('cervezas.edit', $cerveza) }}" class="btn btn-primary"> Editar</a>
                <form action="{{ route('cervezas.destroy', $cerveza) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"> Eliminar</button>
                </form>
            </div>
        </div>

        <div class="row mb-3">
            @foreach ($cerveza->imagenes as $imagen)
                <div class="col">
                    <img class="img-fluid" src="{{ Storage::url($imagen->url) }}">
                </div>
            @endforeach
        </div>

    </div>
@endsection
