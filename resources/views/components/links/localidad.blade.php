@if ($localidad->trashed())
    <del>{{ $localidad->nombre }}</del>
@else
    <a href="{{ route('localidades.show', $localidad) }}">{{ $localidad->nombre }}</a>
@endif