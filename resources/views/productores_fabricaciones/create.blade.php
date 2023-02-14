@extends('layouts.plantilla')
@section('title', 'Crear Tipo de Fabricación')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('productores_fabricaciones.store') }}" method="POST">
                @csrf

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre del Tipo de Fabricación" :value="old('nombre')" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" />
            </form>
        </div>
    </div>
@endsection
