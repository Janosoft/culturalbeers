@extends('layouts.plantilla')
@section('title', 'Recuperar Contraseña')

@section('content')
    <div class="row align-items-center mt-2 mt-lg-4 login">
        <div class="col-lg p-4 text-center">
            <img src="/logo_icon.png" class="img-fluid" alt="Logo" id="logo">
        </div>
        <div class="col-lg">
            <form class="mb-3 mt-md-4" action="{{ route('password.email') }}" method="POST">
                @csrf
                <x-input.email label="Email" name="email" placeholder="Email" :value="old('email')" />
                <div class="d-grid">
                    <x-input.submit label="Recuperar Contraseña" icon="bi bi-box-arrow-in-right" value="Recover" />
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
