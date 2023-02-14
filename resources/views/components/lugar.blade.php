<a href="{{ route('lugares.show', $lugar->slug) }}" class="list-group-item list-group-item-action">
    {{ $lugar->nombre }} @if ($lugar->verificado) <i class="bi bi-check-circle-fill text-warning"></i> @endif
</a>