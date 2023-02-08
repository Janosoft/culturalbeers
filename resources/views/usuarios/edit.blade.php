@extends('layouts.plantilla')
@section('title', 'Editar Usuario')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
                @csrf
                @method('put')

                <x-input.text label="Email" name="email" placeholder="Email" :value="old('email', $usuario->email)" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" />
            </form>
        </div>
    </div>
@endsection
