@extends('layouts.plantilla')
@section('title', 'Crear Color de Cerveza')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('cervezas_colores.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del Color"
                        value="{{ old('nombre') }}">
                    @error('nombre')
                        <label for="floatingInputInvalid">*{{ $message }}</label>
                    @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                </div>
                
            </form>
        </div>
    </div>
@endsection
