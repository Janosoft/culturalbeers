@extends('layouts.plantilla')
@section('title', 'Crear Estilo de Cerveza')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('cervezas_estilos.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre del Estilo" value="{{ old('nombre') }}">
                        @error('nombre')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="familia_id" class="form-label">Familia</label>
                        <select class="form-select" name="familia_id">
                            <option value="" selected>Elija la familia de cerveza a la que pertenece</option>
                            @foreach ($familias as $familia_id => $familia)
                                <option value="{{ $familia_id }}">{{ $familia }}</option>
                            @endforeach
                        </select>
                        @error('familia_id')
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
