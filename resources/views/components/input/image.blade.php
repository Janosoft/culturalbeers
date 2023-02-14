<div class="form-floating mb-3">
    <input type="file" class="form-control" id="{{ $name }}" name="{{ $name }}" accept="image/*" value="{{ $value }}">
    <label for="{{ $name }}">{{ $label }}@error($name) <span class="text-danger">{{ $message }}</span>@enderror</label>
</div>
