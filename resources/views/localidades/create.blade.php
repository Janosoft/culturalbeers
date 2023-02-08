@extends('layouts.plantilla')
@section('title', 'Crear Localidad')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('localidades.store') }}" method="POST">
                @csrf

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre de la Localidad" :value="old('nombre')" />
                <x-input.select label="División Política" name="division_politica_id" placeholder="División Política a la que pertenece" :objects="$divisiones_politicas" :value="old('division_politica_id')" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" />
            </form>
        </div>
    </div>
@endsection
