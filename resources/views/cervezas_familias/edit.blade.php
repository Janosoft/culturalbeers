@extends('layouts.plantilla')
@section('title', 'Editar Familia de Cerveza')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('cervezas_familias.update', $cervezas_familia) }}" method="POST">
                @csrf
                @method('put')

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre de la Familia" :value="old('nombre', $cervezas_familia->nombre)" />
                <x-input.select label="Tipo de Fermento" name="fermento_id" placeholder="Elija un tipo de fermento" :objects="$cervezas_fermentos" :value="old('fermento_id', $cervezas_familia->fermento_id)" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" />
            </form>
        </div>
    </div>
@endsection
