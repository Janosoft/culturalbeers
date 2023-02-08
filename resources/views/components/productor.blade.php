<a href="{{ route('productores.show', $productor->slug) }}" class="list-group-item list-group-item-action">
    {{ $productor->nombre }} @if ($productor->verificado) <i class="bi bi-check-circle-fill text-warning"></i> @endif
</a>