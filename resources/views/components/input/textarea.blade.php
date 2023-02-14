<div class="form-floating">
    <textarea class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $label }}">{{ $value }}</textarea>
    <label for="{{ $name }}">{{ $label }}@error($name) <span class="text-danger">{{ $message }}</span>@enderror</label>
</div>