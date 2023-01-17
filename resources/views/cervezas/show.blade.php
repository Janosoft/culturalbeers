@extends('layouts.plantilla')
@section('title', 'Mostrar Cerveza: ' . $cerveza->nombre)

@section('content')
    <div class="container">

        <div class="row mb-3">
            <div class="col">
                <h1>{{ $cerveza->nombre }}</h1>
                <h2><a href="{{ route('productores.show', $cerveza->productor) }}">{{ $cerveza->productor->nombre }}</a></h2>
                <h4>Color: <a href="{{ route('cervezas_colores.show', $cerveza->color) }}">{{ $cerveza->color->nombre }}</a>
                </h4>
                <h4>Estilo: <a
                        href="{{ route('cervezas_estilos.show', $cerveza->estilo) }}">{{ $cerveza->estilo->nombre }}</a></h4>
                <h4>Envases: <ul class="list-group list-group-horizontal">
                        @foreach ($cerveza->envases as $envase)
                            <a class="list-group-item"
                                href="{{ route('cervezas_envases_tipos.show', $envase) }}">{{ $envase->nombre }}</a>
                        @endforeach
                    </ul>
                </h4>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
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

        <hr>

        @foreach ($cerveza->comentarios as $comentario)
            <div class="row mb-3">
                <div class="col">
                    {{ $comentario->comentario }}
                </div>
            </div>
        @endforeach
        
    </div>
@endsection
