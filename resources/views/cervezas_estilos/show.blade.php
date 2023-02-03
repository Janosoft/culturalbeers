@extends('layouts.plantilla')
@section('title', 'Mostrar Estilo de Cerveza: ' . $cervezas_estilo->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $cervezas_estilo->nombre }}</h1>
            <h2><a href="{{ route('cervezas_familias.show', $cervezas_estilo->familia) }}">{{ $cervezas_estilo->familia->nombre }}</a></h2>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <x-botones.editar :route="route('cervezas_estilos.edit', $cervezas_estilo)" />
            <x-botones.eliminar :route="route('cervezas_estilos.destroy', $cervezas_estilo)" />
        </div>
    </div>

    <x-cervezas :cervezas="$cervezas_estilo->cervezas" />

    <x-comentarios :comentarios="$cervezas_estilo->comentarios" />
    <x-formularios.comentario :route="route('cervezas_estilos.comment', $cervezas_estilo)" />
    
@endsection
