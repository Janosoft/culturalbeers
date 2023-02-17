@extends('layouts.plantilla')
@section('title', 'Crear Continente')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('continentes.store') }}" method="POST">
                @csrf

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre del Continente" :value="old('nombre')" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" value="CrearContinente" />
            </form>
        </div>
    </div>
@endsection
