@extends('layouts.plantilla')
@section('title', 'Mostrar Tipo de Fabricación: ' . $productores_fabricacion->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $productores_fabricacion->nombre }}</h1>
            @if(!empty($productores_fabricacion->descripcion))<p class="mb-3">{{ $productores_fabricacion->descripcion }}</p>@endif
        </div>
    </div>

    @auth
        <div class="row">
            <div class="col">
                <x-botones.editar :route="route('productores_fabricaciones.edit', $productores_fabricacion)" />
                <x-botones.eliminar :route="route('productores_fabricaciones.destroy', $productores_fabricacion)" />
            </div>
        </div>
    @endauth

    <x-productores :productores="$productores_fabricacion->productores" />
@endsection
