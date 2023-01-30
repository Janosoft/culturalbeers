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
            <a href="{{ route('cervezas_colores.edit', $cervezas_color) }}" class="btn btn-primary" title="Editar"><i
                    class="fa-solid fa-pen-to-square"></i></a>
            <form action="{{ route('cervezas_colores.destroy', $cervezas_color) }}" method="POST" style="display: inline;">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </div>

    <x-cervezas :cervezas="$cervezas_color->cervezas" />

@endsection
