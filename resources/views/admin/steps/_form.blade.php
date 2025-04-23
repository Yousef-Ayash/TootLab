@csrf
<div class="form-group">
    <label class="form-label">Procedure</label>
    <select name="procedure_id" class="form-input" required>
        @foreach ($procedures as $pr)
            <option value="{{ $pr->id }}" @selected(old('procedure_id', $step->procedure_id ?? '') == $pr->id)>
                {{ $pr->name }}
            </option>
        @endforeach
    </select>
    @error('procedure_id')
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
<div class="form-group">
    <label class="form-label">Name</label>
    <input name="name" type="text" value="{{ old('name', $step->name ?? '') }}" class="form-input" required>
    @error('name')
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
<div class="form-group">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-input">{{ old('description', $step->description ?? '') }}</textarea>
</div>
<div class="form-group">
    <label class="form-label">Sort Order</label>
    <input name="sort_order" type="number" value="{{ old('sort_order', $step->sort_order ?? 1) }}" class="form-input"
        required>
    @error('sort_order')
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
<button type="submit" class="btn btn--primary btn--block">
    {{ isset($step) ? 'Update Step' : 'Create Step' }}
</button>
