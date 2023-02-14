<div class="row row-cols-3 mb-3">
    @forelse ($cervezas as $cerveza)
        <x-cerveza :cerveza="$cerveza" />
    @empty
        <div class="col">
            No hay Cervezas
        </div>
    @endforelse
</div>
