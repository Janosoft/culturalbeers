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
                        <p class="text-muted m-0">{{ $cerveza->productor->nombre }}@if ($cerveza->productor->verificado) <i class="fa-solid fa-circle-check text-warning"></i> @endif</p>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
