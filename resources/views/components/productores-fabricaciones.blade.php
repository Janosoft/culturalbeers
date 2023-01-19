<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($fabricaciones as $fabricacion)
                <x-productores-fabricacion :nombre="$fabricacion->nombre" :slug="$fabricacion->slug" />
            @empty
                No hay Tipo de Fabricaciones
            @endforelse
        </div>
    </div>
</div>
