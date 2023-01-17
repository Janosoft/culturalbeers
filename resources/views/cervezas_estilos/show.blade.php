@extends('layouts.plantilla')
@section('title', 'Mostrar Estilo de Cerveza: ' . $cervezas_estilo->nombre)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>{{ $cervezas_estilo->nombre }}</h1>
                <h2><a href="{{ route('cervezas_familias.show', $cervezas_estilo->familia) }}">{{ $cervezas_estilo->familia->nombre }}</a></h2>
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

        <div class="row mb-3">
            <div class="col">
                <div class="list-group">
                    @foreach ($cervezas_estilo->cervezas as $cerveza)
                        <a href="{{ route('cervezas.show', $cerveza) }}" class="list-group-item list-group-item-action">{{ $cerveza->nombre }}</a>
                    @endforeach
                    </div>
            </div>
        </div>

        <hr>

        @forelse ($cervezas_estilo->comentarios as $comentario)
            <div class="row mb-3">
                <div class="col">
                    {{ $comentario->comentario }}
                </div>
            </div>
        @empty
            <div class="row mb-3">
                <div class="col">
                    No hay Comentarios
                </div>
            </div>
        @endforelse

    </div>
@endsection
