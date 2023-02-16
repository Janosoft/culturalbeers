@extends('layouts.plantilla')
@section('title', 'Crear Lugar')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('lugares.store') }}" method="POST">
                @csrf

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre del Lugar" :value="old('nombre')" />
                <x-input.select label="Categoría" name="categoria_id" placeholder="Elija la categoría del lugar" :objects="$categorias" :value="old('categoria_id')" />
                <x-input.autosuggest label="Localidad de Origen" name="localidad" placeholder="Buscar Localidad..." :url="route('localidades.search','')" :value="old('localidad')"/>
                <x-input.text label="Dirección" name="direccion" placeholder="Dirección del Lugar" :value="old('direccion')" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" />
            </form>
        </div>
    </div>
@endsection
