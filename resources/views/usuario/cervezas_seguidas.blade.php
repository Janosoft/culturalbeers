@extends('layouts.perfil')

@section('panel')
    <div class="row">
        <div class="col">
            <h4>Cervezas Seguidas</h4>
            <x-cervezas :cervezas="Auth::user()->cervezas_seguidas" />
        </div>
    </div>
@endsection
