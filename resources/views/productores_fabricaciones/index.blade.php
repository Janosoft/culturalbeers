@extends('layouts.plantilla')
@section('title', 'Mostrar Tipos de Fabricación')

@section('content')

    <div class="mb-3">
        <div class="row">
            <div class="col">
                <x-botones.crear :route="route('productores_fabricaciones.create')" />
            </div>
        </div>
    </div>

    <x-productores-fabricaciones :fabricaciones="$productores_fabricaciones" />
    {{ $productores_fabricaciones->links() }}
@endsection
