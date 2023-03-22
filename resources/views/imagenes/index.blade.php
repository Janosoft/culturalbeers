@extends('layouts.plantilla')
@section('title', 'Mostrar Imágenes')

@section('content')

    <x-imagenes :imagenes="$imagenes" />
    {{ $imagenes->links() }}
@endsection