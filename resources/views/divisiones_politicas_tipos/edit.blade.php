@extends('layouts.plantilla')
@section('title', 'Editar Tipo de División Política')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('divisiones_politicas_tipos.update', $divisiones_politicas_tipo) }}" method="POST">
                @csrf
                @method('put')

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre del Tipo de División Política" :value="old('nombre', $divisiones_politicas_tipo->nombre)" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" value="EditarTipoDivision" />
            </form>
        </div>
    </div>
@endsection
