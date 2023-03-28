@extends('layouts.perfil')

@section('panel')
    <div class="row">
        <div class="col">
            <h4>Cervezas Probadas</h4>
            <x-cervezas :cervezas="Auth::user()->cervezas_probadas" />
        </div>
    </div>
@endsection
