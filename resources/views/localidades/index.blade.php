@extends('layouts.plantilla')
@section('title', 'Mostrar Localidades')

@section('content')
    
    <div class="mb-3">
        <div class="row">
            <div class="col">
                <x-botones.crear :route="route('localidades.create')" />
            </div>
        </div>
    </div>

    <x-localidades :localidades="$localidades" />
    {{ $localidades->links() }}
@endsection
