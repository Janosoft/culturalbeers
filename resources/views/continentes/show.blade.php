@extends('layouts.plantilla')
@section('title', 'Mostrar Continente: ' . $continente->nombre)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>{{ $continente->nombre }}</h1>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <a href="{{ route('continentes.edit', $continente) }}" class="btn btn-primary"> Editar</a>
                <form action="{{ route('continentes.destroy', $continente) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"> Eliminar</button>
                </form>
            </div>
        </div>

        <x-paises :paises="$continente->paises" />

    </div>
@endsection
