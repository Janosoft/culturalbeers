@extends('layouts.plantilla')
@section('title', 'Mostrar Tipo de Fermento: ' . $cervezas_fermento->nombre)

@section('content')
    <div class="content">

        <div class="row">
            <div class="col">
                <h1>{{ $cervezas_fermento->nombre }}</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="{{ route('cervezas_fermentos.index') }}"> Volver</a>
                <a href="{{ route('cervezas_fermentos.edit', $cervezas_fermento) }}" class="btn btn-primary"> Editar</a>
                <form action="{{ route('cervezas_fermentos.destroy', $cervezas_fermento) }}" method="POST"
                    style="display: inline;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"> Eliminar</button>
                </form>
            </div>
        </div>

    </div>
@endsection