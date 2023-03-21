@extends('layouts.plantilla')
@section('title', 'Mostrar Estilo de Cerveza: ' . $cervezas_estilo->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $cervezas_estilo->nombre }}</h1>
            @if(!empty($cervezas_estilo->descripcion))<p class="mb-3">{{ $cervezas_estilo->descripcion }}</p>@endif
            <h2><x-links.cervezas-familia :familia="$cervezas_estilo->familia" /></h2>
        </div>
    </div>

    @auth
        <div class="row mb-3">
            <div class="col">
                <x-botones.editar :route="route('cervezas_estilos.edit', $cervezas_estilo)" />
                <x-botones.eliminar :route="route('cervezas_estilos.destroy', $cervezas_estilo)" />
            </div>
        </div>
    @endauth

    <x-cervezas :cervezas="$cervezas_estilo->cervezas" />

    <x-comentarios :comentarios="$cervezas_estilo->comentarios" />
    @auth
    <x-formularios.comentario :route="route('cervezas_estilos.comment', $cervezas_estilo)" />
    @endauth
    
@endsection
