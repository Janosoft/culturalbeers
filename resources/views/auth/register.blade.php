@extends('layouts.plantilla')
@section('title', 'Registrarse')

@section('content')
<form action="{{ route('register') }}" method="POST">
    @csrf
    
    <x-input.text label="Nombre" name="name" placeholder="Nombre y Apellido" :value="old('name')" />
    <x-input.email label="Email" name="email" placeholder="Email" :value="old('email')" />
    <x-input.password label="Contraseña" name="password" placeholder="Contraseña" />
    <x-input.password label="Repetir Contraseña" name="password_confirmation" placeholder="Repetir Contraseña" />
    <x-input.submit label="Registrarse" icon="bi bi-box-arrow-in-right" value="Register" />
</form>
@endsection