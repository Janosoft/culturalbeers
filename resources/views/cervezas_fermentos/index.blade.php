@extends('layouts.plantilla')
@section('title', 'Mostrar Tipos de Fermentos')

@section('content')
    
    @auth
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <x-botones.crear :route="route('cervezas_fermentos.create')" />
                </div>
            </div>
        </div>
    @endauth
    
    <x-cervezas-fermentos :fermentos="$cervezas_fermentos" />
    {{ $cervezas_fermentos->links() }}
@endsection
