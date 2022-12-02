@extends('layouts.plantilla')
@section('title', 'Mostrar Estilo de Cerveza: ' . $cervezas_estilo->nombre)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>{{ $cervezas_estilo->nombre }}</h1>
                <h2>{{ $cervezas_estilo->familia->nombre }}</h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="{{ route('cervezas_estilos.index') }}"> Volver</a>
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
                <ul>
                    @foreach ($cervezas_estilo->cervezas as $cerveza)
                        <div class="col">
                            <li><a href="{{ route('cervezas.show', $cerveza) }}">{{ $cerveza->nombre }}</a></li>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
@endsection
