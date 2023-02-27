@extends('layouts.plantilla')
@section('title', 'Registrarse')

@section('content')
    <div class="row align-items-center mt-2 mt-lg-4 login">
        <div class="col-lg p-4 text-center">
            <img src="/logo_icon.png" class="img-fluid" alt="Logo" id="logo">
        </div>
        <div class="col-lg">
            <form class="mb-3 mt-md-4" action="{{ route('register') }}" method="POST">
                @csrf
                <x-input.text label="Nombre" name="name" placeholder="Nombre y Apellido" :value="old('name')" />
                <x-input.email label="Email" name="email" placeholder="Email" :value="old('email')" />
                <x-input.password label="Contraseña" name="password" placeholder="Contraseña" />
                <x-input.password label="Repetir Contraseña" name="password_confirmation" placeholder="Repetir Contraseña" />
                <x-input.submit label="Registrarse" icon="bi bi-box-arrow-in-right" value="Register" />
            </form>
        </div>
    </div>
@endsection