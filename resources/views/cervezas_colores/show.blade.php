@extends('layouts.plantilla')
@section('title', 'Mostrar Color de Cerveza: ' . $cervezas_color->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $cervezas_color->nombre }}</h1>
            <h4><span>Color <i class="fa-solid fa-beer-mug-empty" style="color: {{ $cervezas_color->color }}"></i></span></h4>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <x-botones.editar :route="route('cervezas_colores.edit', $cervezas_color)" />
            <x-botones.eliminar :route="route('cervezas_colores.destroy', $cervezas_color)" />
        </div>
    </div>

    <x-cervezas :cervezas="$cervezas_color->cervezas" />

@endsection
