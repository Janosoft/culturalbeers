@extends('layouts.plantilla')
@section('title', 'Mostrar Tipo de Envase: ' . $cervezas_envases_tipo->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $cervezas_envases_tipo->nombre }}</h1>
        </div>
    </div>

    @auth
        <div class="row mb-3">
            <div class="col">
                <x-botones.editar :route="route('cervezas_envases_tipos.edit', $cervezas_envases_tipo)" />
                <x-botones.eliminar :route="route('cervezas_envases_tipos.destroy', $cervezas_envases_tipo)" />
            </div>
        </div>
    @endauth

    <x-cervezas :cervezas="$cervezas_envases_tipo->cervezas" />
@endsection
