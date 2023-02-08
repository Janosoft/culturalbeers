<div class="row mb-3">
    <div class="col">
        {{ $comentario->comentario }}
        <small class="text-muted">{{ $comentario->updated_at->format('d/m/Y') }}</small>
        
        @if (!$comentario->autorizado and !$comentario->ofensivo) <x-botones.accion :route="route('comentarios.offensive', $comentario)" title="Es Ofensivo" color="btn-light" icon="bi bi-shield-slash-fill" />@endif
        @if (!$comentario->autorizado and $comentario->ofensivo) <x-botones.accion :route="route('comentarios.authorized', $comentario)" title="Autorizar" color="btn-light" icon="bi bi-shield-fill-check" />@endif
        <form class="form_destroy" action="{{ route('comentarios.destroy', $comentario) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-light" title="Eliminar"><i class="bi bi-trash"></i></button>
        </form>
    </div>
</div>
