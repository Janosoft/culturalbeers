@extends('layouts.plantilla')
@section('title', 'Mostrar Tipo de Fermento: ' . $cervezas_fermento->nombre)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>{{ $cervezas_fermento->nombre }}</h1>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <a href="{{ route('cervezas_fermentos.edit', $cervezas_fermento) }}" class="btn btn-primary"> Editar</a>
                <form action="{{ route('cervezas_fermentos.destroy', $cervezas_fermento) }}" method="POST"
                    style="display: inline;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"> Eliminar</button>
                </form>
            </div>
        </div>

        <x-cervezas-familias :familias="$cervezas_fermento->familias"/>

        <x-comentarios :comentarios="$cervezas_fermento->comentarios" />

    </div>
@endsection