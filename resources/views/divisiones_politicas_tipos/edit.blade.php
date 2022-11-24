@extends('layouts.plantilla')
@section('title', 'Editar Tipo de División Política')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('divisiones_politicas_tipos.update', $division_politica_tipo) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre del Tipo de División Política" value="{{ old('nombre', $division_politica_tipo->nombre) }}">
                        @error('nombre')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
