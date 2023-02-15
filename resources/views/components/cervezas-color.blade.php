@if ($color->trashed())
    <div class="list-group-item list-group-item-action">
        <del>{{ $color->nombre }}</del>
        <x-botones.accion :route="route('cervezas_colores.restore', $color->color_id)" title="Restaurar" color="btn-light" icon="bi bi-recycle" />
        <x-botones.accion :route="route('cervezas_colores.forcedelete', $color->color_id)" title="Eliminar Permanentemente" color="btn-light" icon="bi bi-trash" />
    </div>
@else
    <a href="{{ route('cervezas_colores.show', $color->slug) }}" class="list-group-item list-group-item-action">
        {{ $color->nombre }}
    </a>
@endif
