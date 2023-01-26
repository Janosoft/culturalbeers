@extends('layouts.plantilla')
@section('title', 'Mostrar Cervezas')

@section('content')

    <div class="mb-3">
        <a href="{{ route('cervezas.create') }}" class="btn btn-primary" role="button" title="Crear Nueva"><i class="fa-solid fa-square-plus"></i></a>
    </div>

    <x-cervezas :cervezas="$cervezas" />
    {{ $cervezas->links() }}
@endsection
