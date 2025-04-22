@csrf

<div class="mb-4">
    <label class="block font-medium">Name</label>
    <input type="text" name="name" value="{{ old('name', $color->name ?? '') }}" class="input" required>
</div>

<div class="mb-4">
    <label class="block font-medium">Hex Code</label>
    <input type="color" name="hex_code" value="{{ old('hex_code', $color->hex_code ?? '#ffffff') }}" class="input"
        required>
</div>

<button type="submit" class="btn-primary">
    {{ isset($color) ? 'Update Color' : 'Create Color' }}
</button>
