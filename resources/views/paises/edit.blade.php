@extends('layouts.plantilla')
@section('title', 'Editar País')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('paises.update', $pais) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre del País" value="{{ old('nombre', $pais->nombre) }}">
                        @error('nombre')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="continente_id" class="form-label">Continente</label>
                        <select class="form-select" name="continente_id">
                            @foreach ($continentes as $continente_id => $continente)
                                <option value="{{ $continente_id }}" {{ old('continente_id', $pais->continente_id) == $continente_id ? 'selected' : '' }}>{{ $continente }} </option>
                            @endforeach
                        </select>
                        @error('continente_id')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="divisiones_politicas_tipo_id" class="form-label">Tipo de División Política</label>
                        <select class="form-select" name="divisiones_politicas_tipo_id">
                            @foreach ($divisiones_politicas_tipo as $divisiones_politicas_tipo_id => $divisiones_politicas_tipo)
                            <option value="{{ $divisiones_politicas_tipo_id }}" {{ old('divisiones_politicas_tipo_id', $pais->divisiones_politicas_tipo_id) == $divisiones_politicas_tipo_id ? 'selected' : '' }}>{{ $divisiones_politicas_tipo }} </option>
                                </option>
                            @endforeach
                        </select>
                        @error('divisiones_politicas_tipo_id')
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
