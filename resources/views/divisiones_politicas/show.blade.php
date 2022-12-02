@extends('layouts.plantilla')
@section('title', 'Mostrar División Política: ' . $division_politica->nombre)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>{{ $division_politica->nombre }}</h1>
                <h2>{{ $division_politica->pais->nombre }}</h2>
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
                <ul>
                    @foreach ($division_politica->localidades as $localidad)
                        <div class="col">
                            <li><a href="{{ route('localidades.show', $localidad) }}">{{ $localidad->nombre }}</a></li>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
@endsection
