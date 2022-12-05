@extends('layouts.plantilla')
@section('title', 'Crear Cerveza')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('cervezas.store') }}" method="POST">
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
                        <label for="productor_id" class="form-label">Productor</label>
                        <select class="form-select" name="productor_id">
                            <option value="" selected>Elija el productor de la cerveza</option>
                            @foreach ($productores as $productor_id => $productor)
                                <option value="{{ $productor_id }}">{{ $productor }}</option>
                            @endforeach
                        </select>
                        @error('productor_id')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="color_id" class="form-label">Color</label>
                        <select class="form-select" name="color_id">
                            <option value="" selected>Elija el color de la cerveza</option>
                            @foreach ($colores as $color_id => $color)
                                <option value="{{ $color_id }}">{{ $color }}</option>
                            @endforeach
                        </select>
                        @error('color_id')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="estilo_id" class="form-label">Estilo</label>
                        <select class="form-select" name="estilo_id">
                            <option value="" selected>Elija estilo de la cerveza</option>
                            @foreach ($estilos as $estilo_id => $estilo)
                                <option value="{{ $estilo_id }}">{{ $estilo }}</option>
                            @endforeach
                        </select>
                        @error('estilo_id')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="envase_id" class="form-label">Tipo de Envase</label>
                        <select class="form-select" name="envase_id">
                            <option value="" selected>Elija el tipo de envase que corresponda</option>
                            @foreach ($envases_tipos as $envase_id => $envase)
                                <option value="{{ $envase_id }}">{{ $envase }}</option>
                            @endforeach
                        </select>
                        @error('envase_id')
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
