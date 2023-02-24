@extends('layouts.plantilla')
@section('title', 'Mi Perfil')

@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <img src="https://dummyimage.com/400x400/000000/fff" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>
                    <p class="card-text text-center">{{ Auth::user()->email }}</p>
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="account-profile.html"><i class="bi bi-person me-2"></i>Mi Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="account-bookings.html"><i class="bi bi-ticket-perforated me-2"></i>My
                                Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="account-wishlist.html"><i class="bi bi-heart me-2"></i>Wishlist</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="account-delete.html"><i class="bi bi-trash me-2"></i>Eliminar Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bi bi-escape me-2"></i>Cerrar Sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="col-lg-9">
            @if (empty(Auth::user()->email_verified_at))
                <div class="row">
                    <div class="col">
                        <form class="form_resend" action="{{ route('verification.send') }}" method="POST">
                            @csrf
                            <div class="alert alert-warning text-center" role="alert">
                                Ingrese a su correo electrónico para verificar su cuenta de email.
                                <button type="submit" class="btn btn-danger" title="Reenviar Email"><i class="bi bi-envelope"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
