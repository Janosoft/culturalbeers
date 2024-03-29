@extends('layouts.plantilla')
@section('title', 'Editar Localidad')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('localidades.update', $localidad) }}" method="POST">
                @csrf
                @method('put')

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre de la Localidad" :value="old('nombre', $localidad->nombre)" />
                <x-input.textarea label="Descripción" name="descripcion" height="87px" :value="old('descripcion', $localidad->descripcion)" />
                <x-input.select label="División Política" name="division_politica_id" placeholder="División Política a la que pertenece" :objects="$divisiones_politicas" :value="old('division_politica_id', $localidad->division_politica_id)" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" value="EditarLocalidad" />
            </form>
        </div>
    </div>
@endsection
