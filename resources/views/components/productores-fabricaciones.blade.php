<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($fabricaciones as $fabricacion)
                <x-productores-fabricacion :fabricacion="$fabricacion" />
            @empty
                No hay Tipo de Fabricaciones
            @endforelse
        </div>
    </div>
</div>
