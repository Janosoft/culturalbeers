@extends('layouts.plantilla')
@section('title', 'Editar Persona')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('personas.update', $persona) }}" method="POST">
                @csrf
                @method('put')

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre" :value="old('nombre', $persona->nombre)" />
                <x-input.text label="Apellido" name="apellido" placeholder="Apellido" :value="old('apellido', $persona->apellido)" />
                <x-input.select label="Localidad Actual" name="localidad_id" placeholder="Elija la Localidad actual" :objects="$localidades" :value="old('localidad_id', $persona->localidad_id)" />
                <x-input.image label="Imagen Destacada" name="imagen" :value="old('imagen', $persona->imagen)" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" />
            </form>
        </div>
    </div>
@endsection
