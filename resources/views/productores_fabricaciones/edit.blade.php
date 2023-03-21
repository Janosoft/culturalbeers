@extends('layouts.plantilla')
@section('title', 'Editar Tipo de Fabricación')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('productores_fabricaciones.update', $productores_fabricacion) }}" method="POST">
                @csrf
                @method('put')

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre del Tipo de Fabricación" :value="old('nombre', $productores_fabricacion->nombre)" />
                <x-input.textarea label="Descripción" name="descripcion" height="87px" :value="old('descripcion', $productores_fabricacion->descripcion)" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" value="EditarFabricacion" />
            </form>
        </div>
    </div>
@endsection
