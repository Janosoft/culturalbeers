@extends('layouts.plantilla')
@section('title', 'Editar Usuario')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Email"
                        value="{{ old('nombre', $usuario->email) }}">
                    @error('email')
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
