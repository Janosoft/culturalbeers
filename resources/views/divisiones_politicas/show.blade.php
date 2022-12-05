@extends('layouts.plantilla')
@section('title', 'Mostrar División Política: ' . $division_politica->nombre)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>{{ $division_politica->nombre }}</h1>
                <h2><a href="{{ route('paises.show', $division_politica->pais) }}">{{ $division_politica->pais->nombre }}</a></h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="{{ route('divisiones_politicas.index') }}"> Volver</a>
                <a href="{{ route('divisiones_politicas.edit', $division_politica) }}" class="btn btn-primary"> Editar</a>
                <form action="{{ route('divisiones_politicas.destroy', $division_politica) }}" method="POST"
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
                    @foreach ($division_politica->localidades as $localidad)
                        <div class="col">
                            <a href="{{ route('localidades.show', $localidad) }}" class="list-group-item list-group-item-action">{{ $localidad->nombre }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
