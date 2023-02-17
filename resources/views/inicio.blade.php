@extends('layouts.plantilla')
@section('title', 'Cultural Beers')

@section('content')
    @auth
        Hola {{ Auth::user()->name }}<br>
        <x-botones.cerrar-sesion :route="route('logout')" />
    @else
        <a href="{{ route('login') }}" target="_self">Iniciar Sesión</a>
        <a href="{{ route('register') }}" target="_self">Registrarse</a>
    @endauth
@endsection
