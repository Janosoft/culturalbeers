@extends('layouts.perfil')

@section('panel')
    <div class="row">
        <div class="col">
            <h4>Productores Seguidos</h4>
            <x-productores :productores="Auth::user()->productores_seguidos" />
        </div>
    </div>
@endsection
