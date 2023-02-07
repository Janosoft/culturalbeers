@extends('layouts.plantilla')
@section('title', 'Crear Cerveza')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('cervezas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre de la Cerveza" :value="old('nombre')" />
                <x-input.number label="IBU" name="IBU" min="0" max="100" step="0.5" :value="old('IBU')" />
                <x-input.number label="ABV" name="ABV" min="0" max="100" step="0.5" :value="old('ABV')" />                
                <x-input.select label="Productor" name="productor_id" placeholder="Elija el productor de la cerveza" :objects="$productores" :value="old('productor_id')" />
                <x-input.select label="Color" name="color_id" placeholder="Elija el color de la cerveza" :objects="$colores" :value="old('color_id')" />
                <x-input.select label="Estilo" name="estilo_id" placeholder="Elija el estilo de la cerveza" :objects="$estilos" :value="old('estilo_id')" />
                <x-input.check label="Tipo de Envase" name="envases" :objects="$envases_tipos" :value="old('envases')" />
                <x-input.image label="Imagen Destacada" name="imagen" :value="old('imagen')" />
                <x-input.submit label="Guardar" icon="fa-floppy-disk" />
            </form>
        </div>
    </div>
@endsection
