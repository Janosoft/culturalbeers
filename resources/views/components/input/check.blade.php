<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @foreach ($objects as $envase_id => $envase)
        <div class="form-check form-check-inline">
            @if (empty($value))
                <input class="form-check-input" type="checkbox" name="{{ $name }}[]" id="{{ $name }}_{{ $envase_id }}" value="{{ $envase_id }}">
            @else
                <input class="form-check-input" type="checkbox" name="{{ $name }}[]" id="{{ $name }}_{{ $envase_id }}"
                    value="{{ $envase_id }}"
                    {{ in_array($envase_id, is_array($value) ? $value : $value->toArray()) ? 'checked' : '' }}>
            @endif
            <label class="form-check-label" for="evase_{{ $envase_id }}">{{ $envase }}</label>
        </div>
    @endforeach
    @error($name)
        <br><label for="floatingInputInvalid">*{{ $message }}</label>
    @enderror
</div>
