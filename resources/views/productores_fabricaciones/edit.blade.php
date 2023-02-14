@extends('layouts.plantilla')
@section('title', 'Editar Tipo de Fabricación')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('productores_fabricaciones.update', $productores_fabricacion) }}" method="POST">
                @csrf
                @method('put')

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre del Tipo de Fabricación" :value="old('nombre', $productores_fabricacion->nombre)" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" />
            </form>
        </div>
    </div>
@endsection
