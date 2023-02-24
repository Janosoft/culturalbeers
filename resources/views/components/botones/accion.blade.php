@if (empty($icon ?? ''))
    <a href="{{ $route }}" class="btn {{ $color }}" title="{{ $title }}">{{ $texto ?? '' }}</a>
@else
    <a href="{{ $route }}" class="btn {{ $color }}" title="{{ $title }}"><i class="{{ $icon }}"></i> {{ $texto ?? '' }}</a>
@endif
