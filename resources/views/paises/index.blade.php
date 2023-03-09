@extends('layouts.plantilla')
@section('title', 'Mostrar Paises')

@section('content')
    
    @auth
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <x-botones.crear :route="route('paises.create')" />
                </div>
            </div>
        </div>
    @endauth

    <x-paises :paises="$paises" />
    {{ $paises->links() }}
@endsection
