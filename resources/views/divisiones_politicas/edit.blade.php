@extends('layouts.plantilla')
@section('title', 'Editar División Política')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('divisiones_politicas.update', $division_politica) }}" method="POST">
                @csrf
                @method('put')

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre de la Divisón Política" :value="old('nombre', $division_politica->nombre)" />
                <x-input.select label="País" name="pais_id" placeholder="Elija el país al que pertenece" :objects="$paises" :value="old('pais_id', $division_politica->pais_id)" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" />
            </form>
        </div>
    </div>
@endsection
