<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($continentes as $continente)
                <x-continente :nombre="$continente->nombre" :slug="$continente->slug" />
            @empty
                No hay Continentes
            @endforelse
        </div>
    </div>
</div>