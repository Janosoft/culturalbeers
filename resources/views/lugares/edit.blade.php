@extends('layouts.plantilla')
@section('title', 'Editar Lugar')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('lugares.update', $lugar) }}" method="POST">
                @csrf
                @method('put')

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre del Lugar" :value="old('nombre', $lugar->nombre)" />
                <x-input.autosuggest label="Localidad de Origen" name="localidad" placeholder="Buscar Localidad..." :url="route('localidades.search', '')" :value="old('localidad', $lugar->localidad->nombre)" />
                <x-input.text label="Dirección" name="direccion" placeholder="Dirección del Lugar" :value="old('nombre', $lugar->direccion)" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" />
            </form>
        </div>
    </div>
@endsection