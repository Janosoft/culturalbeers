<div class="form-floating">
    <textarea class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $label }}" style="resize: none;">{{ $value }}</textarea>
    <label for="{{ $name }}">{{ $label }}@error($name) <span class="text-danger">{{ $message }}</span>@enderror</label>
</div>