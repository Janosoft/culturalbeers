@extends('layouts.plantilla')
@section('title', 'Mostrar Tipo de Fabricación: ' . $productores_fabricacion->nombre)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>{{ $productores_fabricacion->nombre }}</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="{{ route('productores_fabricaciones.index') }}"> Volver</a>
                <a href="{{ route('productores_fabricaciones.edit', $productores_fabricacion) }}" class="btn btn-primary">
                    Editar</a>
                <form action="{{ route('productores_fabricaciones.destroy', $productores_fabricacion) }}" method="POST"
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
                    @foreach ($productores_fabricacion->productores as $productor)
                        <div class="col">
                            <li><a href="{{ route('productores.show', $productor) }}">{{ $productor->nombre }}</a></li>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
@endsection
