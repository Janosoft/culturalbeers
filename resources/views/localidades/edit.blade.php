@extends('layouts.plantilla')
@section('title', 'Editar Localidad')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('localidades.update', $localidad) }}" method="POST">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre de la Localidad"
                        value="{{ old('nombre', $localidad->nombre) }}">
                    @error('nombre')
                        <label for="floatingInputInvalid">*{{ $message }}</label>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="division_politica_id" class="form-label">División Política</label>
                    <select class="form-select" name="division_politica_id">
                        <option value="" selected>Elija un tipo de división política</option>
                        @foreach ($divisiones_politicas as $division_politica_id => $division_politica)
                            <option value="{{ $division_politica_id }}"
                                {{ old('division_politica_id', $localidad->division_politica_id) == $division_politica_id ? 'selected' : '' }}>
                                {{ $division_politica }} </option>
                        @endforeach
                    </select>
                    @error('division_politica_id')
                        <label for="floatingInputInvalid">*{{ $message }}</label>
                    @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>

            </form>
        </div>
    </div>
@endsection
