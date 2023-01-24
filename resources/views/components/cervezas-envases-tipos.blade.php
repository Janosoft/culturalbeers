<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($envases as $envase)
                <x-cervezas-envases-tipo :nombre="$envase->nombre" :slug="$envase->slug" />
            @empty
                No hay Tipos de Envase
            @endforelse
        </div>
    </div>
</div>