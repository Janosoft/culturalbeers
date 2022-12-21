@extends('layouts.plantilla')
@section('title', 'Crear Tipo de División Política')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('divisiones_politicas_tipos.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre del Tipo de División Política" value="{{ old('nombre') }}">
                        @error('nombre')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <a href="{{ url()->previous() }}"> Volver</a>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
