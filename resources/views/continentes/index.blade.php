@extends('layouts.plantilla')
@section('title', 'Mostrar Continentes')

@section('content')
    
    @auth
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <x-botones.crear :route="route('continentes.create')" />
                </div>
            </div>
        </div>
    @endauth

    <x-continentes :continentes="$continentes" />
    {{ $continentes->links() }}
@endsection
