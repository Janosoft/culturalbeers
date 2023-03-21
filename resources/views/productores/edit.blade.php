@extends('layouts.plantilla')
@section('title', 'Editar Productor')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('productores.update', $productor) }}" method="POST">
                @csrf
                @method('put')

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre del Productor" :value="old('nombre', $productor->nombre)" />
                <x-input.textarea label="Descripción" name="descripcion" height="87px" :value="old('descripcion', $productor->descripcion)" />
                <x-input.select label="Tipo de Fabricación" name="fabricacion_id" placeholder="Elija el tipo de fabricación" :objects="$fabricaciones" :value="old('fabricacion_id', $productor->fabricacion_id)" />
                <x-input.autosuggest label="Localidad de Origen" name="localidad" placeholder="Buscar Localidad..." :url="route('localidades.search', '')" :value="old('localidad', $productor->localidad->nombre)" />
                <x-input.image label="Imagen Destacada" name="imagen" :value="old('imagen', $productor->imagen)" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" value="EditarProductor" />
            </form>
        </div>
    </div>
@endsection
