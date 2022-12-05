@extends('layouts.plantilla')
@section('title', 'Crear Pais')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('paises.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre del País" value="{{ old('nombre') }}">
                        @error('nombre')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="continente_id" class="form-label">Continente</label>
                        <select class="form-select" name="continente_id">
                            <option value="" selected>Elija el continente al que pertenece</option>
                            @foreach ($continentes as $continente_id => $continente)
                                <option value="{{ $continente_id }}">{{ $continente }}</option>
                            @endforeach
                        </select>
                        @error('continente_id')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="divisiones_politicas_tipo_id" class="form-label">Tipo de División Política</label>
                        <select class="form-select" name="divisiones_politicas_tipo_id">
                            <option value="" selected>Elija un tipo de división política</option>
                            @foreach ($divisiones_politicas_tipo as $divisiones_politicas_tipo_id => $divisiones_politicas_tipo)
                                <option value="{{ $divisiones_politicas_tipo_id }}">{{ $divisiones_politicas_tipo }}</option>
                            @endforeach
                        </select>
                        @error('divisiones_politicas_tipo_id')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
