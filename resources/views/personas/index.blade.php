@extends('layouts.plantilla')
@section('title', 'Mostrar Personas')

@section('content')
    
    <div class="mb-3">
        <div class="row">
            <div class="col">
                <x-botones.crear :route="route('personas.create')" />
            </div>
        </div>
    </div>
    
    <x-personas :personas="$personas" />
    {{ $personas->links() }}
@endsection
