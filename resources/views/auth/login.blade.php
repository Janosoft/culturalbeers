@extends('layouts.plantilla')
@section('title', 'Inicio de Sesión')

@section('content')
    <div class="row align-items-center mt-2 mt-lg-4 login">
        <div class="col-lg p-4 text-center">
            <img src="/logo_icon.png" class="img-fluid" alt="Logo" id="logo">
        </div>
        <div class="col-lg">
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <form class="mb-3 mt-md-4" action="{{ route('login') }}" method="POST">
                @csrf
                <x-input.email label="Email" name="email" placeholder="Email" :value="old('email')" />
                <x-input.password label="Contraseña" name="password" placeholder="Contraseña" />
                <p class="small"><a class="text-primary" href="{{ route('password.request') }}">Recuperar Contraseña</a>
                </p>
                <div class="d-grid">
                    <x-input.submit label="Iniciar Sesión" icon="bi bi-box-arrow-in-right" value="Login" />
                </div>
            </form>
        </div>
    </div>
@endsection
