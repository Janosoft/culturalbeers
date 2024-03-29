@if ($cerveza->trashed())
    @auth
        <div class="list-group-item list-group-item-action">
            <del>{{ $cerveza->nombre }}</del>
            <x-botones.accion :route="route('cervezas.restore', $cerveza->cerveza_id)" title="Restaurar" color="btn-light" icon="bi bi-recycle" />
            <x-botones.accion :route="route('cervezas.forcedelete', $cerveza->cerveza_id)" title="Eliminar Permanentemente" color="btn-light" icon="bi bi-trash" />
        </div>    
    @endauth
@else
    <div class="col mb-3">
        <a href="{{ route('cervezas.show', $cerveza->slug) }}">
            <div class="card">
                <div class="card-body card_cerveza">
                    <div class="row">
                        <div class="col-3">
                            <img class="img-fluid rounded-circle" loading="lazy" src="{{(empty($cerveza->imagen) ? 'https://dummyimage.com/711x400/000000/fff' : Storage::url($cerveza->imagen->url))}}" alt="{{ $cerveza->nombre }}" loading="lazy">
                        </div>
                        <div class="col">
                            {{ $cerveza->nombre }}
                            <p class="text-muted m-0">{{ $cerveza->productor->nombre }}@if ($cerveza->productor->verificado) <i class="bi bi-check-circle-fill text-warning"></i> @endif</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endif
