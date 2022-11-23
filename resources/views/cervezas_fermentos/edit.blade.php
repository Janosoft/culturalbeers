@extends('layouts.plantilla')
@section('title', 'Editar Tipo de Fermento')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('cervezas_fermentos.update', $cervezas_fermento) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre del Tipo de Fermento" value="{{ $cervezas_fermento->nombre }}">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
