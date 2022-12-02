@extends('layouts.plantilla')
@section('title', 'Mostrar Estilo de Cerveza: ' . $cervezas_estilo->nombre)

@section('content')
    <div class="content">

        <div class="row">
            <div class="col">
                <h1>{{ $cervezas_estilo->nombre }}</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="{{ route('cervezas_estilos.index') }}"> Volver</a>
                <a href="{{ route('cervezas_estilos.edit', $cervezas_estilo) }}" class="btn btn-primary"> Editar</a>
                <form action="{{ route('cervezas_estilos.destroy', $cervezas_estilo) }}" method="POST"
                    style="display: inline;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"> Eliminar</button>
                </form>
            </div>
        </div>

    </div>
@endsection
