@if ($divisionpolitica->trashed())
    <del>{{ $divisionpolitica->nombre }}</del>
@else
    <a href="{{ route('divisiones_politicas.show', $divisionpolitica) }}">{{ $divisionpolitica->nombre }}</a>
@endif