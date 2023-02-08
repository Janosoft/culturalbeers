@extends('layouts.plantilla')
@section('title', 'Crear Pais')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('paises.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre del País" :value="old('nombre')" />
                <x-input.select label="Continente" name="continente_id" placeholder="Elija el continente al que pertenece" :objects="$continentes" :value="old('continente_id')" />
                <x-input.select label="Tipo de División Política" name="divisiones_politicas_tipo_id" placeholder="Elija un tipo de división política" :objects="$divisiones_politicas_tipo" :value="old('divisiones_politicas_tipo_id')" />
                <x-input.image label="Imagen Destacada" name="imagen" :value="old('imagen')" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" />
            </form>
        </div>
    </div>
@endsection
