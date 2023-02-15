@if ($fermento->trashed())
    <del>{{ $fermento->nombre }}</del>
@else
    <a href="{{ route('cervezas_fermentos.show', $fermento) }}">{{ $fermento->nombre }}</a>
@endif