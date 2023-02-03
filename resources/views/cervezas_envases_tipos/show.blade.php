@extends('layouts.plantilla')
@section('title', 'Mostrar Tipo de Envase: ' . $cervezas_envases_tipo->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $cervezas_envases_tipo->nombre }}</h1>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('cervezas_envases_tipos.edit', $cervezas_envases_tipo) }}" class="btn btn-primary" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
            <form class="form_destroy" action="{{ route('cervezas_envases_tipos.destroy', $cervezas_envases_tipo) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </div>

    <x-cervezas :cervezas="$cervezas_envases_tipo->cervezas" />
@endsection
