<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($divisiones as $division_politica)
                <x-division-politica :nombre="$division_politica->nombre" :slug="$division_politica->slug" />
            @empty
                No hay Divisiones Políticas
            @endforelse
        </div>
    </div>
</div>