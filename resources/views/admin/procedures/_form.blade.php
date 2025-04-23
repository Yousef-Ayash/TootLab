@csrf
<div class="form-group">
    <label class="form-label">Name</label>
    <input name="name" type="text" value="{{ old('name', $procedure->name ?? '') }}" class="form-input" required>
    @error('name')
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
<div class="form-group">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-input">{{ old('description', $procedure->description ?? '') }}</textarea>
    @error('description')
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
<div class="form-group">
    <label class="form-label">Cost</label>
    <input name="cost" type="number" step="0.01" value="{{ old('cost', $procedure->cost ?? '') }}"
        class="form-input" required>
    @error('cost')
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
<div class="form-group">
    <label class="form-label">Color</label>
    <select name="color_id" class="form-input" required>
        @foreach ($colors as $col)
            <option value="{{ $col->id }}" @selected(old('color_id', $procedure->color_id ?? '') == $col->id)>
                {{ $col->name }}
            </option>
        @endforeach
    </select>
    @error('color_id')
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>

<hr class="divider">
<h2 class="section-title">Procedure Steps</h2>
<div id="steps-container" class="stack">
    @php
        $old = old('steps', []);
        $rows = count($old) ? $old : $procedure->steps->toArray() ?? [];
    @endphp
    @foreach ($rows as $i => $s)
        <div class="step-row card">
            @if (!empty($s['id']))
                <input type="hidden" name="steps[{{ $i }}][id]" value="{{ $s['id'] }}">
            @endif
            <div class="form-group">
                <label class="form-label">Name</label>
                <input name="steps[{{ $i }}][name]" type="text" value="{{ $s['name'] ?? '' }}"
                    class="form-input" required>
                @error("steps.{$i}.name")
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea name="steps[{{ $i }}][description]" class="form-input">{{ $s['description'] ?? '' }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Sort Order</label>
                <input name="steps[{{ $i }}][sort_order]" type="number"
                    value="{{ $s['sort_order'] ?? $i + 1 }}" class="form-input" required>
                @error("steps.{$i}.sort_order")
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>
            <button type="button" class="btn btn--danger btn--small remove-step">×</button>
        </div>
    @endforeach
</div>
<button type="button" id="add-step" class="btn btn--secondary btn--block">+ Add Step</button>
<div class="form-group mt-2">
    <button type="submit" class="btn btn--primary btn--block">
        {{ isset($procedure) ? 'Update Procedure' : 'Create Procedure' }}
    </button>
</div>
