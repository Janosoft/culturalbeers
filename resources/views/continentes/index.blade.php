@extends('layouts.plantilla')
@section('title', 'Mostrar Continentes')

@section('content')
    
    <div class="mb-3">
        <div class="row">
            <div class="col">
                <x-botones.crear :route="route('continentes.create')" />
            </div>
        </div>
    </div>

    <x-continentes :continentes="$continentes" />
    {{ $continentes->links() }}
@endsection
