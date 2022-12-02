@extends('layouts.plantilla')
@section('title', 'Mostrar Localidad: ' . $localidad->nombre)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>{{ $localidad->nombre }}</h1>
                <h2>{{ $localidad->division_politica->nombre }}</h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="{{ route('localidades.index') }}"> Volver</a>
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
                <ul>
                    @foreach ($localidad->productores as $productor)
                        <div class="col">
                            <li><a href="{{ route('productores.show', $productor) }}">{{ $productor->nombre }}</a></li>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <ul>
                    @foreach ($localidad->personas as $persona)
                        <div class="col">
                            <li><a href="{{ route('personas.show', $persona) }}">{{ $persona->nombre }}</a></li>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
@endsection
