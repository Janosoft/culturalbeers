@extends('layouts.plantilla')
@section('title', 'Editar Color de Cerveza')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('cervezas_colores.update', $cervezas_color) }}" method="POST">
                @csrf
                @method('put')

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre del Color" :value="old('nombre', $cervezas_color->nombre)" />
                <x-input.color label="Color" name="color" placeholder="Elija un color" :value="old('color', $cervezas_color->color)" />
                <x-input.submit label="Guardar" icon="fa-floppy-disk" />
            </form>
        </div>
    </div>
@endsection
