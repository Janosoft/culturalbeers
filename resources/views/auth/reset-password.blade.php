@extends('layouts.plantilla')
@section('title', 'Recuperar Contraseña')

@section('content')
    <div class="row align-items-center mt-2 mt-lg-4 login">
        <div class="col-lg p-4 text-center">
            <img src="/logo_icon.png" class="img-fluid" alt="Logo" id="logo">
        </div>
        <div class="col-lg">
            <form class="mb-3 mt-md-4" action="{{ route('password.update') }}" method="POST">
                @csrf
                <input name="token" type="hidden" value="{{$request->token}}">
                <x-input.email label="Email" name="email" placeholder="Email" :value="old('email')" />
                <x-input.password label="Contraseña" name="password" placeholder="Contraseña" />
                <x-input.password label="Repetir Contraseña" name="password_confirmation" placeholder="Repetir Contraseña" />
                <div class="d-grid">
                    <x-input.submit label="Establecer Nueva Contraseña" icon="bi bi-box-arrow-in-right" value="Reset" />
                </div>
            </form>
            @if (session('status')) 
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }} 
                </div>
            @endif
        </div>
    </div>
@endsection
