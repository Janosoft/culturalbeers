@extends('layouts.plantilla')
@section('title', 'Búsqueda')

@section('content')
    <x-input.autosuggest label="Localidad" name="localidad" placeholder="Buscar Localidad..." value="Madryn" :url="route('localidades.search','')"/>
@endsection
