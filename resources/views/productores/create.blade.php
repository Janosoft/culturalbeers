@extends('layouts.plantilla')
@section('title', 'Crear Productor')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('productores.store') }}" method="POST">
                @csrf

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre del Productor" :value="old('nombre')" />
                <x-input.select label="Tipo de Fabricación" name="fabricacion_id" placeholder="Elija el tipo de fabricación" :objects="$fabricaciones" :value="old('fabricacion_id')" />
                <x-input.select label="Localidad de Origen" name="localidad_id" placeholder="Elija la localidad de origen" :objects="$localidades" :value="old('localidad_id')" />
                <x-input.image label="Imagen Destacada" name="imagen" :value="old('imagen')" />
                <x-input.submit label="Guardar" icon="fa-floppy-disk" />
            </form>
        </div>
    </div>
@endsection
