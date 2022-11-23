@extends('layouts.plantilla')
@section('title', 'Editar Tipo de Fabricación')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('productores_fabricaciones.update', $productores_fabricacion) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre del Tipo de Fabricación" value="{{ $productores_fabricacion->nombre }}">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
