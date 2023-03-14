@if ($tipo->trashed())
    @auth
        <div class="list-group-item list-group-item-action">
            <del>{{ $tipo->nombre }}</del>
            <x-botones.accion :route="route('divisiones_politicas_tipos.restore', $tipo->divisiones_politicas_tipo_id)" title="Restaurar" color="btn-light" icon="bi bi-recycle" />
            <x-botones.accion :route="route('divisiones_politicas_tipos.forcedelete', $tipo->divisiones_politicas_tipo_id)" title="Eliminar Permanentemente" color="btn-light" icon="bi bi-trash" />
        </div>
    @endauth    
@else
    <a href="{{ route('divisiones_politicas_tipos.show', $tipo->slug) }}" class="list-group-item list-group-item-action">
        {{ $tipo->nombre }}
    </a>
@endif
