@extends('layouts.plantilla')
@section('title', 'Mostrar País: ' . $pais->nombre)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>{{ $pais->nombre }}</h1>
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

        <div class="row mv-3">
            @foreach ($pais->imagenes as $imagen)
                <div class="col">
                    <img class="img-fluid" src="../storage/{{ $imagen->url }}">
                </div>
            @endforeach
        </div>
    </div>
@endsection
