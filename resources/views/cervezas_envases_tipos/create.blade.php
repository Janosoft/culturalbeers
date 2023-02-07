@extends('layouts.plantilla')
@section('title', 'Crear Tipo de Envase')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('cervezas_envases_tipos.store') }}" method="POST">
                @csrf

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre del Tipo de Envase" :value="old('nombre')" />
                <x-input.submit label="Guardar" icon="fa-floppy-disk" />
            </form>
        </div>
    </div>
@endsection
