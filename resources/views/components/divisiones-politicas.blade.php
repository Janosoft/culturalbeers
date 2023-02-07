<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($divisiones as $division)
                <x-division-politica :division="$division" />
            @empty
                No hay Divisiones Políticas
            @endforelse
        </div>
    </div>
</div>