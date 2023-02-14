@extends('layouts.plantilla')
@section('title', 'Mostrar Paises')

@section('content')
    
    <div class="mb-3">
        <div class="row">
            <div class="col">
                <x-botones.crear :route="route('paises.create')" />
            </div>
        </div>
    </div>
    
    <x-paises :paises="$paises" />
    {{ $paises->links() }}
@endsection
