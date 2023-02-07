@extends('layouts.plantilla')
@section('title', 'Editar Estilo de Cerveza')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('cervezas_estilos.update', $cervezas_estilo) }}" method="POST">
                @csrf
                @method('put')

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre del Estilo" :value="old('nombre', $cervezas_estilo->nombre)" />
                <x-input.select label="Familia" name="familia_id" placeholder="Elija la familia de cerveza a la que pertenece" :objects="$familias" :value="old('familia_id', $cervezas_estilo->familia_id)" />
                <x-input.submit label="Guardar" icon="fa-floppy-disk" />
            </form>
        </div>
    </div>
@endsection
