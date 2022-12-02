@extends('layouts.plantilla')
@section('title', 'Mostrar País: ' . $pais->nombre)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>{{ $pais->nombre }}</h1>
                <h2>{{ $pais->continente->nombre }}</h2>
                <h2>{{ $pais->division_politica_tipo->nombre }}</h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="{{ route('paises.index') }}"> Volver</a>
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
                <ul>
                    @foreach ($pais->divisiones_politicas as $division_politica)
                        <div class="col">
                            <li><a
                                    href="{{ route('divisiones_politicas.show', $division_politica) }}">{{ $division_politica->nombre }}</a>
                            </li>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
@endsection
