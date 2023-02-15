@if ($division->trashed())
    <div class="list-group-item list-group-item-action">
        <del>{{ $division->nombre }}</del>
        <x-botones.accion :route="route('divisiones_politicas.restore', $division->division_politica_id)" title="Restaurar" color="btn-light" icon="bi bi-recycle" />
        <x-botones.accion :route="route('divisiones_politicas.forcedelete', $division->division_politica_id)" title="Eliminar Permanentemente" color="btn-light" icon="bi bi-trash" />
    </div>
@else
    <a href="{{ route('divisiones_politicas.show', $division->slug) }}" class="list-group-item list-group-item-action">
        {{ $division->nombre }}
    </a>
@endif