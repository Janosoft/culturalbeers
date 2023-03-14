@if ($envase->trashed())
    @auth
        <div class="list-group-item list-group-item-action">
            <del>{{ $envase->nombre }}</del>
            <x-botones.accion :route="route('cervezas_envases_tipos.restore', $envase->envase_id)" title="Restaurar" color="btn-light" icon="bi bi-recycle" />
            <x-botones.accion :route="route('cervezas_envases_tipos.forcedelete', $envase->envase_id)" title="Eliminar Permanentemente" color="btn-light" icon="bi bi-trash" />
        </div>
    @endauth    
@else
    <a href="{{ route('cervezas_envases_tipos.show', $envase->slug) }}" class="list-group-item list-group-item-action">
        {{ $envase->nombre }}
    </a>
@endif