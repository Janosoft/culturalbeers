<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <select class="form-select" name="{{ $name }}">
        <option value="" {{ empty($value) ? '' : 'selected' }}>{{ $placeholder }}</option>
        @foreach ($objects as $object_id => $object)
            <option value="{{ $object_id }}" {{ $value == $object_id ? 'selected' : '' }}> {{ $object }}</option>
        @endforeach
    </select>
    @error($name)
        <label for="floatingInputInvalid">*{{ $message }}</label>
    @enderror
</div>
