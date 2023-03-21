@extends('layouts.plantilla')
@section('title', 'Editar Lugar')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('lugares.update', $lugar) }}" method="POST">
                @csrf
                @method('put')

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre del Lugar" :value="old('nombre', $lugar->nombre)" />
                <x-input.textarea label="Descripción" name="descripcion" height="87px" :value="old('descripcion', $lugar->descripcion)" />
                <x-input.select label="Categoría" name="categoria_id" placeholder="Elija la categoría del lugar" :objects="$categorias" :value="old('categoria_id',$lugar->categoria_id)" />
                <x-input.autosuggest label="Localidad de Origen" name="localidad" placeholder="Buscar Localidad..." :url="route('localidades.search', '')" :value="old('localidad', $lugar->localidad->nombre)" />
                <x-input.text label="Dirección" name="direccion" placeholder="Dirección del Lugar" :value="old('nombre', $lugar->direccion)" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" value="EditarLugar" />
            </form>
        </div>
    </div>
@endsection
