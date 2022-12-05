@extends('layouts.plantilla')
@section('title', 'Editar Productor')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('productores.update', $productor) }}" method="POST">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre"
                            value="{{ old('nombre', $productor->nombre) }}">
                        @error('nombre')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="fabricacion_id" class="form-label">Tipo de Fabricación</label>
                        <select class="form-select" name="fabricacion_id">
                            <option value="" selected>Elija el tipo de fabricación</option>
                            @foreach ($fabricaciones as $fabricacion_id => $fabricacion)
                                <option value="{{ $fabricacion_id }}"
                                    {{ old('fabricacion_id', $productor->fabricacion_id) == $fabricacion_id ? 'selected' : '' }}>
                                    {{ $fabricacion }} </option>
                            @endforeach
                        </select>
                        @error('fabricacion_id')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="localidad_id" class="form-label">Localidad de Origen</label>
                        <select class="form-select" name="localidad_id">
                            @foreach ($localidades as $localidad_id => $localidad)
                                <option value="{{ $localidad_id }}"
                                    {{ old('localidad_id', $productor->localidad_id) == $localidad_id ? 'selected' : '' }}>
                                    {{ $localidad }} </option>
                            @endforeach
                        </select>
                        @error('localidad_id')
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
