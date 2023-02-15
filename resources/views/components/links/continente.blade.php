@if ($continente->trashed())
    <del>{{ $continente->nombre }}</del>
@else
    <a href="{{ route('continentes.show', $continente) }}">{{ $continente->nombre }}</a>
@endif