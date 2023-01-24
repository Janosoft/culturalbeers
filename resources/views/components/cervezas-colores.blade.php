<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($colores as $color)
                <x-cervezas-color :nombre="$color->nombre" :slug="$color->slug" />
            @empty
                No hay Colores de Cerveza
            @endforelse
        </div>
    </div>
</div>