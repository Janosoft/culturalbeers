@extends('layouts.plantilla')
@section('title', 'Crear Productor')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('productores.store') }}" method="POST">
                @csrf

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre del Productor" :value="old('nombre')" />
                <x-input.textarea label="Descripción" name="descripcion" height="87px" :value="old('descripcion')" />
                <x-input.select label="Tipo de Fabricación" name="fabricacion_id" placeholder="Elija el tipo de fabricación" :objects="$fabricaciones" :value="old('fabricacion_id')" />
                <x-input.autosuggest label="Localidad de Origen" name="localidad" placeholder="Buscar Localidad..." :url="route('localidades.search','')" :value="old('localidad')"/>
                <x-input.image label="Imagen Destacada" name="imagen" :value="old('imagen')" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" value="CrearProductor" />
            </form>
        </div>
    </div>
@endsection
