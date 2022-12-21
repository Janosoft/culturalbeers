@extends('layouts.plantilla')
@section('title', 'Crear Persona')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('personas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre"
                            value="{{ old('nombre') }}">
                        @error('nombre')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" name="apellido" placeholder="Apellido"
                            value="{{ old('apellido') }}">
                        @error('apellido')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="localidad_id" class="form-label">Localidad Actual</label>
                        <select class="form-select" name="localidad_id">
                            <option value="" selected>Elija la localidad actual</option>
                            @foreach ($localidades as $localidad_id => $localidad)
                                <option value="{{ $localidad_id }}">{{ $localidad }}</option>
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
                        <a href="{{ url()->previous() }}"> Volver</a>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
