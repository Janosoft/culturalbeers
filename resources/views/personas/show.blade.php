@extends('layouts.plantilla')
@section('title', 'Mostrar Persona: ' . $persona->nombre)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>{{ $persona->nombre }}</h1>
                <h2>{{ $persona->localidad->nombre }}</h2>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <a href="{{ route('personas.index') }}"> Volver</a>
                <a href="{{ route('personas.edit', $persona) }}" class="btn btn-primary"> Editar</a>
                <form action="{{ route('personas.destroy', $persona) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"> Eliminar</button>
                </form>
            </div>
        </div>

        <div class="row mb-3">
            @foreach ($persona->imagenes as $imagen)
                <div class="col">
                    <img class="img-fluid" src="../storage/{{ $imagen->url }}">
                </div>
            @endforeach
        </div>

    </div>
@endsection
