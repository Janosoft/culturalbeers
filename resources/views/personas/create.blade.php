@extends('layouts.plantilla')
@section('title', 'Crear Persona')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('personas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre" :value="old('nombre')" />
                <x-input.text label="Apellido" name="apellido" placeholder="Apellido" :value="old('apellido')" />
                <x-input.select label="Localidad Actual" name="localidad_id" placeholder="Elija la Localidad actual" :objects="$localidades" :value="old('localidad_id')" />
                <x-input.image label="Imagen Destacada" name="imagen" :value="old('imagen')" />
                <x-input.submit label="Guardar" icon="fa-floppy-disk" />
            </form>
        </div>
    </div>
@endsection
