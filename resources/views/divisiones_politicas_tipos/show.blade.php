@extends('layouts.plantilla')
@section('title', 'Mostrar Divisiones Políticas Tipo: ' . $divisiones_politicas_tipo->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $divisiones_politicas_tipo->nombre }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a href="{{ route('divisiones_politicas_tipos.edit', $divisiones_politicas_tipo) }}" class="btn btn-primary" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
            <form class="form_destroy" action="{{ route('divisiones_politicas_tipos.destroy', $divisiones_politicas_tipo) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </div>

    <x-paises :paises="$divisiones_politicas_tipo->paises" />
@endsection
