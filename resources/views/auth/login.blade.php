@extends('layouts.plantilla')
@section('title', 'Inicio de Sesión')

@section('content')
<form action="{{ route('login') }}" method="POST">
    @csrf
    
    <x-input.email label="Email" name="email" placeholder="Email" :value="old('email')" />
    <x-input.password label="Contraseña" name="password" placeholder="Contraseña" />
    <x-input.submit label="Iniciar Sesión" icon="bi bi-box-arrow-in-right" value="Login" />
</form>
@endsection