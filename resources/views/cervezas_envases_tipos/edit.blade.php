@extends('layouts.plantilla')
@section('title', 'Editar Tipo de Envase')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('cervezas_envases_tipos.update', $cervezas_envases_tipo) }}" method="POST">
                @csrf
                @method('put')

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre del Tipo de Envase" :value="old('nombre', $cervezas_envases_tipo->nombre)" />
                <x-input.textarea label="Descripción" name="descripcion" height="87px" :value="old('descripcion', $cervezas_envases_tipo->descripcion)" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" value="EditarEnvase" />
            </form>
        </div>
    </div>
@endsection
