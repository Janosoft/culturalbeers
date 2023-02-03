<div class="row mb-3">
    <div class="col">
        {{ $comentario->comentario }}
        <small class="text-muted">{{ $comentario->updated_at->format('d/m/Y') }}</small>
        @if (!$comentario->autorizado and !$comentario->ofensivo) <a href="{{ route('comentarios.offensive', $comentario) }}" class="btn btn-light" title="Es Ofensivo"><i class="fa-solid fa-skull-crossbones"></i></a>@endif
        @if (!$comentario->autorizado and $comentario->ofensivo) <a href="{{ route('comentarios.authorized', $comentario) }}" class="btn btn-light" title="Autorizar"><i class="fa-solid fa-check"></i></a>@endif
        <form class="form_destroy" action="{{ route('comentarios.destroy', $comentario) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-light" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
        </form>
    </div>
</div>
