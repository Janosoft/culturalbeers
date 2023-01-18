@extends('layouts.plantilla')
@section('title', 'Mostrar Tipo de Envase: ' . $cervezas_envases_tipo->nombre)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>{{ $cervezas_envases_tipo->nombre }}</h1>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <a href="{{ route('cervezas_envases_tipos.edit', $cervezas_envases_tipo) }}" class="btn btn-primary">
                    Editar</a>
                <form action="{{ route('cervezas_envases_tipos.destroy', $cervezas_envases_tipo) }}" method="POST"
                    style="display: inline;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"> Eliminar</button>
                </form>
            </div>
        </div>

        <x-cervezas :cervezas="$cervezas_envases_tipo->cervezas" />

    </div>
@endsection
