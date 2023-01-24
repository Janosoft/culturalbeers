@extends('layouts.plantilla')
@section('title', 'Crear Productor')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('productores.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del Productor"
                        value="{{ old('nombre') }}">
                    @error('nombre')
                        <label for="floatingInputInvalid">*{{ $message }}</label>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="fabricacion_id" class="form-label">Tipo de Fabricación</label>
                    <select class="form-select" name="fabricacion_id">
                        <option value="" {{ empty(old('fabricacion_id')) ? '' : 'selected' }}>Elija el tipo de
                            fabricación</option>
                        @foreach ($fabricaciones as $fabricacion_id => $fabricacion)
                            <option value="{{ $fabricacion_id }}"
                                {{ old('fabricacion_id') == $fabricacion_id ? 'selected' : '' }}>{{ $fabricacion }}
                            </option>
                        @endforeach
                    </select>
                    @error('fabricacion_id')
                        <label for="floatingInputInvalid">*{{ $message }}</label>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="localidad_id" class="form-label">Localidad de Origen</label>
                    <select class="form-select" name="localidad_id">
                        <option value="" {{ empty(old('localidad_id')) ? '' : 'selected' }}>Elija la localidad de
                            origen</option>
                        @foreach ($localidades as $localidad_id => $localidad)
                            <option value="{{ $localidad_id }}"
                                {{ old('localidad_id') == $localidad_id ? 'selected' : '' }}>{{ $localidad }}
                            </option>
                        @endforeach
                    </select>
                    @error('localidad_id')
                        <label for="floatingInputInvalid">*{{ $message }}</label>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input class="form-control" type="file" id="imagen" name="imagen" accept="image/*">
                    @error('imagen')
                        <label for="floatingInputInvalid">*{{ $message }}</label>
                    @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>

            </form>
        </div>
    </div>
@endsection
