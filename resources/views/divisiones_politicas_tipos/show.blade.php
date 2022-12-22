@extends('layouts.plantilla')
@section('title', 'Mostrar Divisiones Políticas Tipo: ' . $divisiones_politicas_tipo->nombre)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>{{ $divisiones_politicas_tipo->nombre }}</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="{{ route('divisiones_politicas_tipos.edit', $divisiones_politicas_tipo) }}" class="btn btn-primary">
                    Editar</a>
                <form action="{{ route('divisiones_politicas_tipos.destroy', $divisiones_politicas_tipo) }}" method="POST"
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
                    @foreach ($divisiones_politicas_tipo->paises as $pais)
                        <a href="{{ route('paises.show', $pais) }}" class="list-group-item list-group-item-action">{{ $pais->nombre }}</a>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

@endsection
