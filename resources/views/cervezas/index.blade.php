@extends('layouts.plantilla')
@section('title', 'Mostrar Cervezas')

@section('content')
    <a href="{{ route('cervezas.create') }}">Crear Nueva</a>
    <x-cervezas :cervezas="$cervezas" />
    {{ $cervezas->links() }}
@endsection
