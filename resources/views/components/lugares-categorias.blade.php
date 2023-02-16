<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($categorias as $categoria)
                <x-lugares-categoria :categoria="$categoria" />
            @empty
                No hay Categorías
            @endforelse
        </div>
    </div>
</div>
