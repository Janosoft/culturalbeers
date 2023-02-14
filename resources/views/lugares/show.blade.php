@extends('layouts.plantilla')
@section('title', 'Mostrar Lugar: ' . $lugar->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $lugar->nombre }} @if ($lugar->verificado) <i class="bi bi-check-circle-fill text-warning"></i> @endif</h1>
            <h2>{{ $lugar->direccion }}</h2>
            <h2><a href="{{ route('lugares.show', $lugar->localidad) }}">{{ $lugar->localidad->nombre }}</a> </h2>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            @if (!$lugar->verificado) <x-botones.accion :route="route('lugares.verify', $lugar)" title="Verificar" color="btn-warning" icon="bi bi-check2-square" />@endif
            <x-botones.editar :route="route('lugares.edit', $lugar)" />
            <x-botones.eliminar :route="route('lugares.destroy', $lugar)" />            
        </div>
    </div>

    <x-comentarios :comentarios="$lugar->comentarios" />
    <x-formularios.comentario :route="route('lugares.comment', $lugar)" />

@endsection