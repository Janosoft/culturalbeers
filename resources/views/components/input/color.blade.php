<div class="form-floating mb-3">
    <input type="color" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ $value }}">
    <label for="{{ $name }}">{{ $label }}@error($name) <span class="text-danger">{{ $message }}</span>@enderror</label>
</div>
