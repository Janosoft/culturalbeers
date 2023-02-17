@extends('layouts.plantilla')
@section('title', 'Editar Tipo de Fermento')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('cervezas_fermentos.update', $cervezas_fermento) }}" method="POST">
                @csrf
                @method('put')

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre del Tipo de Fermento" :value="old('nombre', $cervezas_fermento->nombre)" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" value="EditarFermento" />
            </form>
        </div>
    </div>
@endsection
