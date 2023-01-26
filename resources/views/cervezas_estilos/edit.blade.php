@extends('layouts.plantilla')
@section('title', 'Editar Estilo de Cerveza')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('cervezas_estilos.update', $cervezas_estilo) }}" method="POST">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del Estilo de Cerveza"
                        value="{{ old('nombre', $cervezas_estilo->nombre) }}">
                    @error('nombre')
                        <label for="floatingInputInvalid">*{{ $message }}</label>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="familia_id" class="form-label">Familia</label>
                    <select class="form-select" name="familia_id">
                        @foreach ($familias as $familia_id => $familia)
                            <option value="{{ $familia_id }}"
                                {{ old('familia_id', $cervezas_estilo->familia_id) == $familia_id ? 'selected' : '' }}>
                                {{ $familia }} </option>
                        @endforeach
                    </select>
                    @error('familia_id')
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
