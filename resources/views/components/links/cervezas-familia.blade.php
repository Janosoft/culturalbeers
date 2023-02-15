@if ($familia->trashed())
    <del>{{ $familia->nombre }}</del>
@else
    <a href="{{ route('cervezas_familias.show', $familia) }}">{{ $familia->nombre }}</a>
@endif