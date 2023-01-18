@extends('layouts.plantilla')
@section('title', 'Mostrar Cervezas')

@section('content')
    <div class="container">
        <a href="{{ route('cervezas.create') }}">Crear Nueva</a>
        <x-cervezas :cervezas="$cervezas" />
        {{ $cervezas->links() }}
    </div>
@endsection
