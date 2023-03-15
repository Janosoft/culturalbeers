@extends('layouts.perfil')

@section('panel')
    @if (empty(Auth::user()->email_verified_at))
        <div class="row">
            <div class="col">
                <form class="form_resend" action="{{ route('verification.send') }}" method="POST">
                    @csrf
                    <div class="alert alert-warning text-center" role="alert">
                        Ingrese a su correo electrónico para verificar su cuenta de email.
                        <button type="submit" class="btn btn-danger" title="Reenviar Email"><i
                                class="bi bi-envelope"></i></button>
                    </div>
                </form>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <h1>Panel De Usuario</h1>
        </div>
    </div>
@endsection
