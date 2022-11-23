@extends('layouts.plantilla')
@section('title', 'Editar División Política')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('divisiones_politicas.update', $division_politica) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre de la División Política" value="{{ $division_politica->nombre }}">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
