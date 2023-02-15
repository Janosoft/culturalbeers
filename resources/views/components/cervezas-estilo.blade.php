@if ($estilo->trashed())
    <div class="list-group-item list-group-item-action">
        <del>{{ $estilo->nombre }}</del>
        <x-botones.accion :route="route('cervezas_estilos.restore', $estilo->estilo_id)" title="Restaurar" color="btn-light" icon="bi bi-recycle" />
        <x-botones.accion :route="route('cervezas_estilos.forcedelete', $estilo->estilo_id)" title="Eliminar Permanentemente" color="btn-light" icon="bi bi-trash" />
    </div>
@else
    <a href="{{ route('cervezas_estilos.show', $estilo->slug) }}" class="list-group-item list-group-item-action">
        {{ $estilo->nombre }}
    </a>
@endif
