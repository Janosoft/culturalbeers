@if ($fermento->trashed())
    <div class="list-group-item list-group-item-action">
        <del>{{ $fermento->nombre }}</del>
        <x-botones.accion :route="route('cervezas_fermentos.restore', $fermento->fermento_id)" title="Restaurar" color="btn-light" icon="bi bi-recycle" />
        <x-botones.accion :route="route('cervezas_fermentos.forcedelete', $fermento->fermento_id)" title="Eliminar Permanentemente" color="btn-light" icon="bi bi-trash" />
    </div>
@else
    <a href="{{ route('cervezas_fermentos.show', $fermento->slug) }}" class="list-group-item list-group-item-action">
        {{ $fermento->nombre }}
    </a>
@endif
