<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($familias as $familia)
                <x-cervezas-familia :nombre="$familia->nombre" :slug="$familia->slug" />
            @empty
                No hay Familias de Cerveza
            @endforelse
        </div>
    </div>
</div>