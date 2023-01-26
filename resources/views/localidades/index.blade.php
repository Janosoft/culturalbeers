@extends('layouts.plantilla')
@section('title', 'Mostrar Localidades')

@section('content')
    
    <div class="mb-3">
        <a href="{{ route('localidades.create') }}" class="btn btn-primary" role="button" title="Crear Nueva"><i class="fa-solid fa-square-plus"></i></a>
    </div>

    <x-localidades :localidades="$localidades" />
    {{ $localidades->links() }}
@endsection
