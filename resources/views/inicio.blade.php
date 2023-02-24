@extends('layouts.plantilla')
@section('title', 'Cultural Beers')

@section('content')
    @auth
        Hola {{ Auth::user()->name }}<br>
        @if (empty(Auth::user()->email_verified_at))
            <h4>Ingrese a su correo electrónico para verificar su cuenta de email</h4>
            <form class="form_resend" action="{{ route('verification.send') }}" method="POST">
                @csrf
                
                <button type="submit" class="btn btn-danger" title="Reenviar Email"><i class="bi bi-trash"></i></button>
            </form>
        @endif
        <x-botones.cerrar-sesion :route="route('logout')" />
    @else
        <a href="{{ route('login') }}" target="_self">Iniciar Sesión</a>
        <a href="{{ route('register') }}" target="_self">Registrarse</a>
    @endauth
@endsection
