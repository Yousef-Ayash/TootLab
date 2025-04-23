@csrf
<div class="form-group">
    <label class="form-label">Name</label>
    <input name="name" type="text" value="{{ old('name', $color->name ?? '') }}" class="form-input" required>
    @error('name')
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
<div class="form-group">
    <label class="form-label">Hex Code</label>
    <input name="hex_code" type="color" value="#{{ old('hex_code', $color->hex_code ?? 'ffffff') }}" class="form-input"
        required>
    @error('hex_code')
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
<button type="submit" class="btn btn--primary btn--block">
    {{ isset($color) ? 'Update Color' : 'Create Color' }}
</button>
