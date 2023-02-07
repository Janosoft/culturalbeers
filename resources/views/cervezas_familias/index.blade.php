@extends('layouts.plantilla')
@section('title', 'Mostrar Familia de Cervezas')

@section('content')
    
    <div class="mb-3">
        <div class="row">
            <div class="col">
                <x-botones.crear :route="route('cervezas_familias.create')" />  
            </div>
        </div>
    </div>
    
    <x-cervezas-familias :familias="$cervezas_familias" />
    {{ $cervezas_familias->links() }}
@endsection
