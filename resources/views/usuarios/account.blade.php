@extends('layouts.plantilla')
@section('title', 'Crear Usuario')

@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <img src="https://dummyimage.com/400x400/000000/fff" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $usuario->persona->nombre . ' ' . $usuario->persona->apellido }}</h5>
                    <p class="card-text text-center">{{ $usuario->email }}</p>
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="account-profile.html"><i class="bi bi-person me-2"></i>Mi Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="account-bookings.html"><i class="bi bi-ticket-perforated me-2"></i>My Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="account-wishlist.html"><i class="bi bi-heart me-2"></i>Wishlist</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="account-delete.html"><i class="bi bi-trash me-2"></i>Eliminar Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="#"><i class="bi bi-escape me-2"></i>Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="col-lg-9">
            @if ($usuario->porcentajeBarraEstado()) <x-account.estado :usuario="$usuario" />@endif
            
        </div>
    </div>
@endsection
