@if ($productor->trashed())
    <del>{{ $productor->nombre }}</del>
        @if ($productor->verificado)
            <i class="bi bi-check-circle-fill text-warning"></i>
        @endif    
@else
    <a href="{{ route('productores.show', $productor) }}">{{ $productor->nombre }}
        @if ($productor->verificado)
            <i class="bi bi-check-circle-fill text-warning"></i>
        @endif
    </a>
@endif
