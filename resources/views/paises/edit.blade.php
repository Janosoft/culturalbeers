@extends('layouts.plantilla')
@section('title', 'Editar País')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('paises.update', $pais) }}" method="POST">
                @csrf
                @method('put')

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre del País" :value="old('nombre', $pais->nombre)" />
                <x-input.textarea label="Descripción" name="descripcion" height="87px" :value="old('descripcion', $pais->descripcion)" />
                <x-input.select label="Continente" name="continente_id" placeholder="Elija el continente al que pertenece" :objects="$continentes" :value="old('continente_id', $pais->continente_id)" />
                <x-input.select label="Tipo de División Política" name="divisiones_politicas_tipo_id" placeholder="Elija un tipo de división política" :objects="$divisiones_politicas_tipo" :value="old('divisiones_politicas_tipo_id', $pais->divisiones_politicas_tipo_id)" />
                <x-input.image label="Imagen Destacada" name="imagen" :value="old('imagen', $pais->imagen)" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" value="EditarPais" />
            </form>
        </div>
    </div>
@endsection
