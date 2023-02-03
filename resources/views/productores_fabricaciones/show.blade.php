@extends('layouts.plantilla')
@section('title', 'Mostrar Tipo de Fabricación: ' . $productores_fabricacion->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $productores_fabricacion->nombre }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a href="{{ route('productores_fabricaciones.edit', $productores_fabricacion) }}" class="btn btn-primary">
                Editar</a>
            <form class="form_destroy" action="{{ route('productores_fabricaciones.destroy', $productores_fabricacion) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </div>

    <x-productores :productores="$productores_fabricacion->productores" />
@endsection
