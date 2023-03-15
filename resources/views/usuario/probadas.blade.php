@extends('layouts.plantilla')
@section('title', 'Mi Perfil')

@section('content')
    <div class="row mb-3">
        <div class="col-lg-3">
            <div class="card">
                <img src="{{ empty(Auth::user()->imagen) ? 'https://dummyimage.com/400x400/000000/fff' : Storage::url(Auth::user() > imagen->url) }}"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ Auth::user()->nombre . ' ' . Auth::user()->apellido }}</h5>
                    <p class="card-text text-center">{{ Auth::user()->email }}</p>
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item"><a class="nav-link active" href="{{ route('usuario.perfil') }}"><i class="bi bi-person me-2"></i>Mi Perfil</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('usuario.probadas') }}"><i class="bi bi-person-check me-2"></i>Cervezas Probadas</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('usuario.puntuadas') }}"><i class="bi bi-star-fill me-2"></i>Cervezas Puntuadas</a></li>
                        <li class="nav-item"><a class="nav-link" href="account-delete.html"><i class="bi bi-trash me-2"></i>Eliminar Perfil</a> </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-escape me-2"></i>Cerrar Sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="col-lg-9">
            <div class="row">
                <div class="col">
                    <h4>Cervezas Probadas</h4>
                    <x-cervezas :cervezas="Auth::user()->cervezas_probadas" />
                </div>
            </div>
        </div>
    </div>
@endsection
