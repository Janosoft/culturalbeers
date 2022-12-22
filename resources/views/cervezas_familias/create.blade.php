@extends('layouts.plantilla')
@section('title', 'Crear Familia de Cerveza')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('cervezas_familias.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre de la Familia" value="{{ old('nombre') }}">
                        @error('nombre')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="fermento_id" class="form-label">Tipo de Fermento</label>
                        <select class="form-select" name="fermento_id">
                            <option value="" {{ empty(old('fermento_id')) ? '' : 'selected' }}>Elija un tipo de fermento</option>
                            @foreach ($cervezas_fermentos as $fermento_id => $fermento)
                                <option value="{{ $fermento_id }}" {{ old('fermento_id') == $fermento_id ? 'selected' : '' }}>{{ $fermento }}</option>
                            @endforeach
                        </select>
                        @error('fermento_id')
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
