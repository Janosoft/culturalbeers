@extends('layouts.plantilla')
@section('title', 'Crear Color de Cerveza')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('cervezas_colores.store') }}" method="POST">
                @csrf

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre del Color" :value="old('nombre')" />
                <x-input.color label="Color" name="color" placeholder="Elija un color" :value="old('color')" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" />                
            </form>
        </div>
    </div>
@endsection
