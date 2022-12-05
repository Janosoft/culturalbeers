@extends('layouts.plantilla')
@section('title', 'Editar Persona')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('personas.update', $persona) }}" method="POST">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{ old('nombre', $persona->nombre) }}">
                        @error('nombre')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" name="apellido" placeholder="Apellido" value="{{ old('apellido', $persona->apellido) }}">
                        @error('apellido')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="localidad_id" class="form-label">Localidad Actual</label>
                        <select class="form-select" name="localidad_id">
                            @foreach ($localidades as $localidad_id => $localidad)
                            <option value="{{ $localidad_id }}"
                            {{ old('localidad_id', $persona->localidad_id) == $localidad_id ? 'selected' : '' }}>
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
