<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($lugares as $lugar)
                <x-lugar :lugar="$lugar" />
            @empty
                No hay Lugares
            @endforelse
        </div>
    </div>
</div>