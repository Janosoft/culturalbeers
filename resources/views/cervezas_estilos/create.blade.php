@extends('layouts.plantilla')
@section('title', 'Crear Estilo de Cerveza')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('cervezas_estilos.store') }}" method="POST">
                @csrf

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre del Estilo" :value="old('nombre')" />
                <x-input.textarea label="Descripción" name="descripcion" height="87px" :value="old('descripcion')" />
                <x-input.select label="Familia" name="familia_id" placeholder="Elija la familia de cerveza a la que pertenece" :objects="$familias" :value="old('familia_id')" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" value="CrearEstilo" />
            </form>
        </div>
    </div>
@endsection
