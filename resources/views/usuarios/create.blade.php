@extends('layouts.plantilla')
@section('title', 'Crear Usuario')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf

                <x-input.text label="Email" name="email" placeholder="Email" :value="old('email')" />
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" />
            </form>
        </div>
    </div>
@endsection
