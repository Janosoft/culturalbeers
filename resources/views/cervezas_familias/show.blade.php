@extends('layouts.plantilla')
@section('title', 'Mostrar Familia de Cerveza: ' . $cervezas_familia->nombre)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>{{ $cervezas_familia->nombre }}</h1>
                <h2><a href="{{ route('cervezas_fermentos.show', $cervezas_familia->fermento) }}">{{ $cervezas_familia->fermento->nombre }}</a></h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="{{ route('cervezas_familias.index') }}"> Volver</a>
                <a href="{{ route('cervezas_familias.edit', $cervezas_familia) }}" class="btn btn-primary"> Editar</a>
                <form action="{{ route('cervezas_familias.destroy', $cervezas_familia) }}" method="POST"
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
                    @foreach ($cervezas_familia->estilos as $estilo)
                        <div class="col">
                            <a href="{{ route('cervezas_estilos.show', $estilo) }}" class="list-group-item list-group-item-action">{{ $estilo->nombre }}</a>
                        </div>
                    @endforeach
                    </div>
            </div>
        </div>

    </div>
@endsection
