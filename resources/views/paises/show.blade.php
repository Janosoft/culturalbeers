@extends('layouts.plantilla')
@section('title', 'Mostrar País: ' . $pais->nombre)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>{{ $pais->nombre }}</h1>
                <h2><a href="{{ route('continentes.show', $pais->continente) }}">{{ $pais->continente->nombre }}</a></h2>
                <h2><a href="{{ route('divisiones_politicas_tipos.show', $pais->division_politica_tipo) }}">{{ $pais->division_politica_tipo->nombre }}</a></h2>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <a href="{{ url()->previous() }}"> Volver</a>
                <a href="{{ route('paises.edit', $pais) }}" class="btn btn-primary"> Editar</a>
                <form action="{{ route('paises.destroy', $pais) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"> Eliminar</button>
                </form>
            </div>
        </div>

        <div class="row mb-3">
            @foreach ($pais->imagenes as $imagen)
                <div class="col">
                    <img class="img-fluid" src="../storage/{{ $imagen->url }}">
                </div>
            @endforeach
        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="list-group">
                    @foreach ($pais->divisiones_politicas as $division_politica)
                        <a href="{{ route('divisiones_politicas.show', $division_politica) }}" class="list-group-item list-group-item-action">{{ $division_politica->nombre }}</a>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
