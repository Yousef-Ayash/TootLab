@csrf
<div class="form-group">
    <label class="form-label">Order Number</label>
    <input name="order_number" type="text" value="{{ old('order_number', $order->order_number ?? '') }}"
        class="form-input" required>
    @error('order_number')
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
<div class="form-group">
    <label class="form-label">Center Name</label>
    <input name="center_name" type="text" value="{{ old('center_name', $order->center_name ?? '') }}"
        class="form-input" required>
    @error('center_name')
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
<div class="form-group">
    <label class="form-label">Patient Name</label>
    <input name="patient_name" type="text" value="{{ old('patient_name', $order->patient_name ?? '') }}"
        class="form-input" required>
    @error('patient_name')
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>

<hr class="divider">

<h2 class="section-title">Order Items</h2>
<div id="items-container" class="stack">
    @php
        $old = old('items', []);
        $items = count($old) ? $old : [['tooth_number' => '', 'procedure_id' => '', 'color_id' => '', 'notes' => '']];
    @endphp
    @foreach ($items as $i => $item)
        <div class="item-row card">
            <div class="form-group">
                <label class="form-label">Tooth Number</label>
                <select name="items[{{ $i }}][tooth_number]" class="form-input" required>
                    <option value="">Select</option>
                    @for ($t = 11; $t <= 48; $t++)
                        <option value="{{ $t }}" @selected($item['tooth_number'] == $t)>{{ $t }}</option>
                    @endfor
                </select>
                @error("items.{$i}.tooth_number")
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Procedure</label>
                <select name="items[{{ $i }}][procedure_id]" class="form-input" required>
                    <option value="">Select</option>
                    @foreach ($procedures as $proc)
                        <option value="{{ $proc->id }}" @selected($item['procedure_id'] == $proc->id)>{{ $proc->name }}</option>
                    @endforeach
                </select>
                @error("items.{$i}.procedure_id")
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Color</label>
                <select name="items[{{ $i }}][color_id]" class="form-input" required>
                    <option value="">Select</option>
                    @foreach ($colors as $col)
                        <option value="{{ $col->id }}" @selected($item['color_id'] == $col->id)>{{ $col->name }}</option>
                    @endforeach
                </select>
                @error("items.{$i}.color_id")
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Notes</label>
                <textarea name="items[{{ $i }}][notes]" class="form-input">{{ $item['notes'] }}</textarea>
            </div>
            <button type="button" class="btn btn--danger btn--small remove-item">×</button>
        </div>
    @endforeach
</div>

<button type="button" id="add-item" class="btn btn--secondary btn--block">
    + Add Tooth
</button>

<div class="form-group mt-2">
    <button type="submit" class="btn btn--primary btn--block">
        {{ isset($order) ? 'Update Order' : 'Create Order' }}
    </button>
</div>
