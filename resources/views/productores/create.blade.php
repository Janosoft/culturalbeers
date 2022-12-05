@extends('layouts.plantilla')
@section('title', 'Crear Productor')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('productores.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre del Productor" value="{{ old('nombre') }}">
                        @error('nombre')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="fabricacion_id" class="form-label">Tipo de Fabricación</label>
                        <select class="form-select" name="fabricacion_id">
                            <option value="" selected>Elija el tipo de fabricación</option>
                            @foreach ($fabricaciones as $fabricacion_id => $fabricacion)
                                <option value="{{ $fabricacion_id }}">{{ $fabricacion }}</option>
                            @endforeach
                        </select>
                        @error('fabricacion_id')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="localidad_id" class="form-label">Localidad de Origen</label>
                        <select class="form-select" name="localidad_id">
                            <option value="" selected>Elija la localidad de origen</option>
                            @foreach ($localidades as $localidad_id => $localidad)
                                <option value="{{ $localidad_id }}">{{ $localidad }}</option>
                            @endforeach
                        </select>
                        @error('localidad_id')
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
