@extends('layouts.plantilla')
@section('title', 'Editar Categoría de Lugares')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('lugares_categorias.update', $lugares_categoria) }}" method="POST">
                @csrf
                @method('put')

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre de la Categoría" :value="old('nombre', $lugares_categoria->nombre)" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" value="EditarCategoria" />
            </form>
        </div>
    </div>
@endsection
