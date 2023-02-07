<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="number" min="{{ $min }}" max="{{ $max }}" step="{{ $step }}" class="form-control" name="{{ $name }}" value="{{ $value }}">
    @error($name)
        <label for="floatingInputInvalid">*{{ $message }}</label>
    @enderror
</div>