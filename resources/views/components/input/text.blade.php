<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="text" class="form-control" name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ $value }}">
    @error($name)
        <label for="floatingInputInvalid">*{{ $message }}</label>
    @enderror
</div>