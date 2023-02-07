@extends('layouts.plantilla')
@section('title', 'Crear División Política')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('divisiones_politicas.store') }}" method="POST">
                @csrf

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre de la Divisón Política" :value="old('nombre')" />
                <x-input.select label="País" name="pais_id" placeholder="Elija el país al que pertenece" :objects="$paises" :value="old('pais_id')" />
                <x-input.submit label="Guardar" icon="fa-floppy-disk" />
            </form>
        </div>
    </div>
@endsection
