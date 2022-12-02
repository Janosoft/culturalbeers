@extends('layouts.plantilla')
@section('title', 'Mostrar Familia de Cerveza: ' . $cervezas_familia->nombre)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>{{ $cervezas_familia->nombre }}</h1>
                <h2>{{ $cervezas_familia->fermento->nombre }}</h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="{{ route('cervezas_familias.index') }}"> Volver</a>
                <a href="{{ route('cervezas_familias.edit', $cervezas_familia) }}" class="btn btn-primary"> Editar</a>
                <form action="{{ route('cervezas_familias.destroy', $cervezas_familia) }}" method="POST"
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
                    @foreach ($cervezas_familia->estilos as $estilo)
                        <div class="col">
                            <li><a href="{{ route('cervezas_estilos.show', $estilo) }}">{{ $estilo->nombre }}</a></li>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
@endsection
