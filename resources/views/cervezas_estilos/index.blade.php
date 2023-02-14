@extends('layouts.plantilla')
@section('title', 'Mostrar Estilos de Cervezas')

@section('content')

    <div class="mb-3">
        <div class="row">
            <div class="col">
                <x-botones.crear :route="route('cervezas_estilos.create')" />
            </div>
        </div>
    </div>
    
    <x-cervezas-estilos :estilos="$cervezas_estilos" />
    {{ $cervezas_estilos->links() }}
@endsection
