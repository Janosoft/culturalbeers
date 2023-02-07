@extends('layouts.plantilla')
@section('title', 'Crear Familia de Cerveza')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('cervezas_familias.store') }}" method="POST">
                @csrf

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre de la Familia" :value="old('nombre')" />
                <x-input.select label="Tipo de Fermento" name="fermento_id" placeholder="Elija un tipo de fermento" :objects="$cervezas_fermentos" :value="old('fermento_id')" />
                <x-input.submit label="Guardar" icon="fa-floppy-disk" />
            </form>
        </div>
    </div>
@endsection
