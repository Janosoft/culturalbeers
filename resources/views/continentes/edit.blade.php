@extends('layouts.plantilla')
@section('title', 'Editar Continente')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('continentes.update', $continente) }}" method="POST">
                @csrf
                @method('put')

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre del Continente" :value="old('nombre', $continente->nombre)" />
                <x-input.textarea label="Descripción" name="descripcion" height="87px" :value="old('descripcion', $continente->descripcion)" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" value="EditarContinente" />
            </form>
        </div>
    </div>
@endsection
