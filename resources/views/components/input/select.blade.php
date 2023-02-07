<div class="form-floating mb-3">
    <select class="form-select @error($name) is-invalid @enderror" name="{{ $name }}">
        <option value="" {{ empty($value) ? '' : 'selected' }}>{{ $placeholder }}</option>
        @foreach ($objects as $object_id => $object)
            <option value="{{ $object_id }}" {{ $value == $object_id ? 'selected' : '' }}> {{ $object }}</option>
        @endforeach
    </select>
    <label for="{{ $name }}">{{ $label }}@error($name) <span class="text-danger">{{ $message }}</span>@enderror</label>
</div>