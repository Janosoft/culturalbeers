@extends('layouts.plantilla')
@section('title', 'Mostrar Productores de Cervezas')

@section('content')
    
    @auth
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <x-botones.crear :route="route('productores.create')" />
                </div>
            </div>
        </div>
    @endauth

    <x-productores :productores="$productores" />
    {{ $productores->links() }}
@endsection
