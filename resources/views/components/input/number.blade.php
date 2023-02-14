<div class="form-floating mb-3">
    <input type="number" min="{{ $min }}" max="{{ $max }}" step="{{ $step }}" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}">
    <label for="{{ $name }}">{{ $label }}@error($name) <span class="text-danger">{{ $message }}</span>@enderror</label>
</div>