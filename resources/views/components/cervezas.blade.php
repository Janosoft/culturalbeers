<div class="row mb-3">
    @forelse ($cervezas as $cerveza)
        <x-cerveza :nombre="$cerveza->nombre" :productor="$cerveza->productor->nombre" :slug="$cerveza->slug" />
            @empty
        <div class="col">
            No hay Cervezas
        </div>
    @endforelse
</div>