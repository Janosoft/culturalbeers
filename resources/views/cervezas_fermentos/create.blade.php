@extends('layouts.plantilla')
@section('title', 'Crear Tipos de Fermentos')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('cervezas_fermentos.store') }}" method="POST">
                @csrf

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre del Tipo de Fermento" :value="old('nombre')" />
                <x-input.textarea label="Descripción" name="descripcion" height="87px" :value="old('descripcion')" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" value="CrearFermento" />
            </form>
        </div>
    </div>
@endsection
