@extends('layouts.plantilla')
@section('title', 'Mostrar Color de Cerveza: ' . $cervezas_color->nombre)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>{{ $cervezas_color->nombre }}</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="{{ route('cervezas_colores.index') }}"> Volver</a>
                <a href="{{ route('cervezas_colores.edit', $cervezas_color) }}" class="btn btn-primary"> Editar</a>
                <form action="{{ route('cervezas_colores.destroy', $cervezas_color) }}" method="POST"
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
                    @foreach ($cervezas_color->cervezas as $cerveza)
                        <div class="col">
                            <li><a href="{{ route('cervezas.show', $cerveza) }}">{{ $cerveza->nombre }}</a></li>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
@endsection
