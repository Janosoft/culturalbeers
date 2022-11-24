@extends('layouts.plantilla')
@section('title', 'Editar Localidad')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('localidades.update', $localidad) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre de la Localidad" value="{{ old('nombre', $localidad->nombre) }}">
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
