<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="color" class="form-control form-control-color" name="{{ $name }}" title="{{ $placeholder }}"
        value="{{ $value }}">
    @error($name)
        <label for="floatingInputInvalid">*{{ $message }}</label>
    @enderror
</div>
