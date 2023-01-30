@extends('layouts.plantilla')
@section('title', 'Crear Cerveza')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('cervezas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre de la Cerveza"
                        value="{{ old('nombre') }}">
                    @error('nombre')
                        <label for="floatingInputInvalid">*{{ $message }}</label>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="IBU" class="form-label">IBU</label>
                    <input type="number" min="0" max="100" step="0.5" class="form-control" name="IBU" value="{{ old('IBU') }}">
                    @error('IBU')
                        <label for="floatingInputInvalid">*{{ $message }}</label>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="ABV" class="form-label">ABV</label>
                    <input type="number" min="0" max="100" step="0.5" class="form-control" name="ABV" value="{{ old('ABV') }}">
                    @error('IBU')
                        <label for="floatingInputInvalid">*{{ $message }}</label>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="productor_id" class="form-label">Productor</label>
                    <select class="form-select" name="productor_id">
                        <option value="" {{ empty(old('productor_id')) ? '' : 'selected' }}>Elija el productor de
                            la cerveza</option>
                        @foreach ($productores as $productor_id => $productor)
                            <option value="{{ $productor_id }}"
                                {{ old('productor_id') == $productor_id ? 'selected' : '' }}>
                                {{ $productor }}</option>
                        @endforeach
                    </select>
                    @error('productor_id')
                        <label for="floatingInputInvalid">*{{ $message }}</label>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="color_id" class="form-label">Color</label>
                    <select class="form-select" name="color_id">
                        <option value="" {{ empty(old('productor_id')) ? '' : 'selected' }}>Elija el color de la
                            cerveza</option>
                        @foreach ($colores as $color_id => $color)
                            <option value="{{ $color_id }}" {{ old('color_id') == $color_id ? 'selected' : '' }}>
                                {{ $color }}
                            </option>
                        @endforeach
                    </select>
                    @error('color_id')
                        <label for="floatingInputInvalid">*{{ $message }}</label>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="estilo_id" class="form-label">Estilo</label>
                    <select class="form-select" name="estilo_id">
                        <option value="" {{ empty(old('productor_id')) ? '' : 'selected' }}>Elija estilo de la
                            cerveza</option>
                        @foreach ($estilos as $estilo_id => $estilo)
                            <option value="{{ $estilo_id }}" {{ old('estilo_id') == $estilo_id ? 'selected' : '' }}>
                                {{ $estilo }}</option>
                        @endforeach
                    </select>
                    @error('estilo_id')
                        <label for="floatingInputInvalid">*{{ $message }}</label>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="envases" class="form-label">Tipo de Envase</label>
                    @foreach ($envases_tipos as $envase_id => $envase)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="envases[]" id="evase_{{ $envase_id }}"
                                value="{{ $envase_id }}"
                                {{ in_array($envase_id, empty(old('envases')) ? [] : old('envases')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="evase_{{ $envase_id }}">{{ $envase }}</label>
                        </div>
                    @endforeach
                    @error('envases')
                        <br><label for="floatingInputInvalid">*{{ $message }}</label>
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
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                </div>

            </form>
        </div>
    </div>
@endsection
