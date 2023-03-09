@extends('layouts.plantilla')
@section('title', 'Mostrar Colores de Cervezas')

@section('content')
    
    @auth
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <x-botones.crear :route="route('cervezas_colores.create')" />
                </div>
            </div>
        </div>
    @endauth
    
    <x-cervezas-colores :colores="$cervezas_colores" />
    {{ $cervezas_colores->links() }}
@endsection
