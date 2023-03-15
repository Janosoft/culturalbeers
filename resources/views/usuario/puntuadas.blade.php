@extends('layouts.perfil')

@section('panel')
    <div class="row">
        <div class="col">
            <h4>Cervezas Puntuadas</h4>
                    <x-cervezas :cervezas="Auth::user()->cervezas_puntuadas" />
        </div>
    </div>
@endsection
