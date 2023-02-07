<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($continentes as $continente)
                <x-continente :continente="$continente" />
            @empty
                No hay Continentes
            @endforelse
        </div>
    </div>
</div>
