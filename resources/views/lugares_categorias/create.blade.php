@extends('layouts.plantilla')
@section('title', 'Crear Categoría de Lugares')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('lugares_categorias.store') }}" method="POST">
                @csrf

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre de la Categoría" :value="old('nombre')" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" />
            </form>
        </div>
    </div>
@endsection
