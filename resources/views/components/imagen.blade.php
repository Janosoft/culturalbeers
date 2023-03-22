<div class="col">
    <a href="{{ route('imagenes.show', $imagen) }}">
        <img class="img-fluid" loading="lazy" src="{{Storage::url($imagen->url)}}">
        @auth
            @if (!$imagen->autorizada and !$imagen->ofensiva) <x-botones.accion :route="route('imagenes.offensive', $imagen)" title="Es Ofensivo" color="btn-light" icon="bi bi-shield-slash-fill" />@endif
            @if (!$imagen->autorizada and $imagen->ofensiva) <x-botones.accion :route="route('imagenes.authorized', $imagen)" title="Autorizar" color="btn-light" icon="bi bi-shield-fill-check" />@endif
            <form class="form_destroy" action="{{ route('imagenes.destroy', $imagen) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-light" title="Eliminar"><i class="bi bi-trash"></i></button>
            </form>
        @endauth
    </a>
</div>