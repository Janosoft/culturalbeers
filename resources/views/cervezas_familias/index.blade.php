@extends('layouts.plantilla')
@section('title', 'Mostrar Familia de Cervezas')

@section('content')
    
    @auth
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <x-botones.crear :route="route('cervezas_familias.create')" />  
                </div>
            </div>
        </div>
    @endauth
    
    <x-cervezas-familias :familias="$cervezas_familias" />
    {{ $cervezas_familias->links() }}
@endsection
