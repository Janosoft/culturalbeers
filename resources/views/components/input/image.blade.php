<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input class="form-control" type="file" id="imagen" name="imagen" accept="image/*" value="{{ $value }}">
    @error($name)
        <label for="floatingInputInvalid">*{{ $message }}</label>
    @enderror
</div>
