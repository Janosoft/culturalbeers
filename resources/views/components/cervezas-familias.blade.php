<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($familias as $familia)
                <x-cervezas-familia :familia="$familia" />
            @empty
                No hay Familias de Cerveza
            @endforelse
        </div>
    </div>
</div>