@extends('layouts.plantilla')
@section('title', 'Mostrar Tipos de Envases')

@section('content')
    
    <div class="mb-3">
        <div class="row">
            <div class="col">
                <x-botones.crear :route="route('cervezas_envases_tipos.create')" />
            </div>
        </div>
    </div>
    
    <x-cervezas-envases-tipos :envases="$cervezas_envases_tipos" />
    {{ $cervezas_envases_tipos->links() }}
@endsection
