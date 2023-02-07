<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($productores as $productor)
                <x-productor :productor="$productor" />
            @empty
                No hay Productores
            @endforelse
        </div>
    </div>
</div>
