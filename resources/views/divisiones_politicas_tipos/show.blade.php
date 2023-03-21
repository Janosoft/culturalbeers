@extends('layouts.plantilla')
@section('title', 'Mostrar Divisiones Políticas Tipo: ' . $divisiones_politicas_tipo->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $divisiones_politicas_tipo->nombre }}</h1>
            @if(!empty($divisiones_politicas_tipo->descripcion))<p class="mb-3">{{ $divisiones_politicas_tipo->descripcion }}</p>@endif
        </div>
    </div>

    @auth
        <div class="row">
            <div class="col">
                <x-botones.editar :route="route('divisiones_politicas_tipos.edit', $divisiones_politicas_tipo)" />
                <x-botones.eliminar :route="route('divisiones_politicas_tipos.destroy', $divisiones_politicas_tipo)" />
            </div>
        </div>
    @endauth

    <x-paises :paises="$divisiones_politicas_tipo->paises" />
@endsection
