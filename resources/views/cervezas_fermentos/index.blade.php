@extends('layouts.plantilla')
@section('title', 'Mostrar Tipos de Fermentos')

@section('content')
    
    <div class="mb-3">
        <div class="row">
            <div class="col">
                <x-botones.crear :route="route('cervezas_fermentos.create')" />
            </div>
        </div>
    </div>
    
    <x-cervezas-fermentos :fermentos="$cervezas_fermentos" />
    {{ $cervezas_fermentos->links() }}
@endsection
