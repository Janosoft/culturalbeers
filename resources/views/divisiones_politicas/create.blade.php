@extends('layouts.plantilla')
@section('title', 'Crear División Política')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('divisiones_politicas.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre de la Divisón Política"
                            value="{{ old('nombre') }}">
                        @error('nombre')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="pais_id" class="form-label">País</label>
                        <select class="form-select" name="pais_id">
                            <option value="" {{ empty(old('pais_id')) ? '' : 'selected' }}>Elija el país al que pertenece</option>
                            @foreach ($paises as $pais_id => $pais)
                                <option value="{{ $pais_id }}" {{ old('pais_id') == $pais_id ? 'selected' : '' }}>
                                    {{ $pais }}</option>
                            @endforeach
                        </select>
                        @error('pais_id')
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
