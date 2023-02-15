@if ($divisionpoliticatipo->trashed())
    <del>{{ $divisionpoliticatipo->nombre }}</del>
@else
    <a href="{{ route('divisiones_politicas_tipos.show', $divisionpoliticatipo) }}">{{ $divisionpoliticatipo->nombre }}</a>
@endif