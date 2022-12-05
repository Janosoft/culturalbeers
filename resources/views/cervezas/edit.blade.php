@extends('layouts.plantilla')
@section('title', 'Editar Cerveza')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('cervezas.update', $cerveza) }}" method="POST">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre de la Cerveza"
                            value="{{ old('nombre', $cerveza->nombre) }}">
                        @error('nombre')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="productor_id" class="form-label">Productor</label>
                        <select class="form-select" name="productor_id">
                            @foreach ($productores as $productor_id => $productor)
                                <option value="{{ $productor_id }}"
                                    {{ old('productor_id', $cerveza->productor_id) == $productor_id ? 'selected' : '' }}>
                                    {{ $productor }} </option>
                            @endforeach
                        </select>
                        @error('productor_id')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="color_id" class="form-label">Color</label>
                        <select class="form-select" name="color_id">
                            @foreach ($colores as $color_id => $color)
                                <option value="{{ $color_id }}"
                                    {{ old('color_id', $cerveza->color_id) == $color_id ? 'selected' : '' }}>
                                    {{ $color }} </option>
                            @endforeach
                        </select>
                        @error('color_id')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="estilo_id" class="form-label">Estilo</label>
                        <select class="form-select" name="estilo_id">
                            @foreach ($estilos as $estilo_id => $estilo)
                                <option value="{{ $estilo_id }}"
                                    {{ old('estilo_id', $cerveza->estilo_id) == $estilo_id ? 'selected' : '' }}>
                                    {{ $estilo }} </option>
                            @endforeach
                        </select>
                        @error('estilo_id')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="envase_id" class="form-label">Tipo de Envase</label>
                        <select class="form-select" name="envase_id">
                            @foreach ($envases_tipos as $envase_id => $envase)
                                <option value="{{ $envase_id }}"
                                    {{ old('envase_id', $cerveza->envase_id) == $envase_id ? 'selected' : '' }}>
                                    {{ $envase }} </option>
                            @endforeach
                        </select>
                        @error('envase_id')
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
