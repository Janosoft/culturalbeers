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
                <a href="{{ route('divisiones_politicas_tipos.index') }}"> Volver</a>
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
                <ul>
                    @foreach ($divisiones_politicas_tipo->paises as $pais)
                        <div class="col">
                            <li><a href="{{ route('paises.show', $pais) }}">{{ $pais->nombre }}</a></li>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>

@endsection
