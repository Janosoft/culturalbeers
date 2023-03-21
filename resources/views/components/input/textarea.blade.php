<div class="form-floating mb-3">
    <textarea class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $name }}" style="height: {{ $height }}; resize: none;" placeholder="{{ $label }}">{{ $value }}</textarea>
    <label for="{{ $name }}">{{ $label }}@error($name) <span class="text-danger">{{ $message }}</span>@enderror</label>
</div>