@extends('layouts.plantilla')
@section('title', 'Mostrar Tipos de Envases')

@section('content')
    
    @auth
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <x-botones.crear :route="route('cervezas_envases_tipos.create')" />
                </div>
            </div>
        </div>
    @endauth
    
    <x-cervezas-envases-tipos :envases="$cervezas_envases_tipos" />
    {{ $cervezas_envases_tipos->links() }}
@endsection
