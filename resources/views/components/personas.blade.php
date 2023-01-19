<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($personas as $persona)
                <x-persona :nombre="$persona->nombre" :slug="$persona->slug" />
            @empty
                No hay Personas
            @endforelse
        </div>
    </div>
</div>