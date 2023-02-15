@extends('layouts.plantilla')
@section('title', 'Mostrar Familia de Cerveza: ' . $cervezas_familia->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $cervezas_familia->nombre }}</h1>
            <h2><x-links.cervezas-fermento :fermento="$cervezas_familia->fermento" /></h2>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <x-botones.editar :route="route('cervezas_familias.edit', $cervezas_familia)" />
            <x-botones.eliminar :route="route('cervezas_familias.destroy', $cervezas_familia)" />
        </div>
    </div>

    <x-cervezas-estilos :estilos="$cervezas_familia->estilos" />

    <x-comentarios :comentarios="$cervezas_familia->comentarios" />
    <x-formularios.comentario :route="route('cervezas_familias.comment', $cervezas_familia)" />

@endsection
