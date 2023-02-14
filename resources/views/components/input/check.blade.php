<div class="mb-3">
    <label for="{{ $name }}">{{ $label }}@error($name) <span class="text-danger">{{ $message }}</span>@enderror</label><br>
    @foreach ($objects as $envase_id => $envase)
        <div class="form-check form-check-inline @error($name) is-invalid @enderror">
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
</div>
