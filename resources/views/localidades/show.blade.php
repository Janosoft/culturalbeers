@extends('layouts.plantilla')
@section('title', 'Mostrar Localidad: ' . $localidad->nombre)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>{{ $localidad->nombre }}</h1>
                <h2><a href="{{ route('divisiones_politicas.show', $localidad->division_politica) }}">{{ $localidad->division_politica->nombre }}</a></h2>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <a href="{{ url()->previous() }}"> Volver</a>
                <a href="{{ route('localidades.edit', $localidad) }}" class="btn btn-primary"> Editar</a>
                <form action="{{ route('localidades.destroy', $localidad) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"> Eliminar</button>
                </form>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="list-group">
                    @foreach ($localidad->productores as $productor)
                        <a href="{{ route('productores.show', $productor) }}" class="list-group-item list-group-item-action">{{ $productor->nombre }}</a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="list-group">
                    @foreach ($localidad->personas as $persona)
                        <a href="{{ route('personas.show', $persona) }}" class="list-group-item list-group-item-action">{{ $persona->nombre }}</a>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
