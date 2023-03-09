@extends('layouts.plantilla')
@section('title', 'Mostrar Categoría de Lugares: ' . $lugares_categoria->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $lugares_categoria->nombre }}</h1>
        </div>
    </div>

    @auth
        <div class="row">
            <div class="col">
                <x-botones.editar :route="route('lugares_categorias.edit', $lugares_categoria)" />
                <x-botones.eliminar :route="route('lugares_categorias.destroy', $lugares_categoria)" />
            </div>
        </div>
    @endauth

    <x-lugares :lugares="$lugares_categoria->lugares" />
@endsection
