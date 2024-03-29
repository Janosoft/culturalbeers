@extends('layouts.plantilla')
@section('title', 'Crear Tipo de División Política')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('divisiones_politicas_tipos.store') }}" method="POST">
                @csrf

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre del Tipo de División Política" :value="old('nombre')" />
                <x-input.textarea label="Descripción" name="descripcion" height="87px" :value="old('descripcion')" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" value="CrearTipoDivision" />
            </form>
        </div>
    </div>
@endsection
