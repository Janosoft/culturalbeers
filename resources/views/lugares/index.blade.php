@extends('layouts.plantilla')
@section('title', 'Mostrar Lugares')

@section('content')
    
    <div class="mb-3">
        <div class="row">
            <div class="col">
                <x-botones.crear :route="route('lugares.create')" />
            </div>
        </div>
    </div>

    <x-lugares :lugares="$lugares" />
    {{ $lugares->links() }}
@endsection
