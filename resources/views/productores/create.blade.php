@extends('layouts.plantilla')
@section('title', 'Crear Productor')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('productores.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre del Productor">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection