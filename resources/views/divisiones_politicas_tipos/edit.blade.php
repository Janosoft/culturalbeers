@extends('layouts.plantilla')
@section('title', 'Editar Tipo de División Política')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('divisiones_politicas_tipos.update', $divisiones_politicas_tipo) }}" method="POST">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre"
                        placeholder="Nombre del Tipo de División Política"
                        value="{{ old('nombre', $divisiones_politicas_tipo->nombre) }}">
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
