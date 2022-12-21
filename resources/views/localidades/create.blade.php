@extends('layouts.plantilla')
@section('title', 'Crear Localidad')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('localidades.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre de la Localidad"
                            value="{{ old('nombre') }}">
                        @error('nombre')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="division_politica_id" class="form-label">División Política</label>
                        <select class="form-select" name="division_politica_id">
                            <option value="" {{ empty(old('division_politica_id')) ? '' : 'selected' }}>Elija un tipo de división política</option>
                            @foreach ($divisiones_politicas as $division_politica_id => $division_politica)
                                <option value="{{ $division_politica_id }}"
                                    {{ old('division_politica_id') == $division_politica_id ? 'selected' : '' }}>
                                    {{ $division_politica }}</option>
                            @endforeach
                        </select>
                        @error('division_politica_id')
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
