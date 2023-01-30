@extends('layouts.plantilla')
@section('title', 'Editar Color de Cerveza')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('cervezas_colores.update', $cervezas_color) }}" method="POST">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del Color"
                        value="{{ old('nombre', $cervezas_color->nombre) }}">
                    @error('nombre')
                        <label for="floatingInputInvalid">*{{ $message }}</label>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="color" class="form-control form-control-color" name="color" title="Elija un color" value="{{ old('color', $cervezas_color->color) }}">
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
