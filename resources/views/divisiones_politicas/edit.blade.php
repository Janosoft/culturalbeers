@extends('layouts.plantilla')
@section('title', 'Editar División Política')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('divisiones_politicas.update', $division_politica) }}" method="POST">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre de la División Política"
                            value="{{ old('nombre', $division_politica->nombre) }}">
                        @error('nombre')
                            <label for="floatingInputInvalid">*{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="pais_id" class="form-label">País</label>
                        <select class="form-select" name="pais_id">
                            @foreach ($paises as $pais_id => $pais)
                                <option value="{{ $pais_id }}"
                                    {{ old('pais_id', $division_politica->pais_id) == $pais_id ? 'selected' : '' }}>
                                    {{ $pais }} </option>
                            @endforeach
                        </select>
                        @error('pais_id')
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
