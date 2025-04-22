@csrf

{{-- Core Order Fields --}}
<div class="mb-4">
    <label class="block font-medium">Order Number</label>
    <input type="text" name="order_number" value="{{ old('order_number', $order->order_number ?? '') }}"
        class="input w-full" required>
    @error('order_number')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block font-medium">Center Name</label>
    <input type="text" name="center_name" value="{{ old('center_name', $order->center_name ?? '') }}"
        class="input w-full" required>
    @error('center_name')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block font-medium">Patient Name</label>
    <input type="text" name="patient_name" value="{{ old('patient_name', $order->patient_name ?? '') }}"
        class="input w-full" required>
    @error('patient_name')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div>

<hr class="my-6">

<h2 class="text-lg font-semibold mb-2">Order Items</h2>

<div id="items-container" class="space-y-4">
    @php
        $old = old('items', []);
        $items = count($old) ? $old : [['tooth_number' => '', 'procedure_id' => '', 'color_id' => '', 'notes' => '']];
    @endphp

    @foreach ($items as $i => $item)
        <div class="item-row bg-gray-50 p-4 rounded-lg border relative">
            <div class="mb-2">
                <label class="block font-medium">Tooth Number</label>
                <select name="items[{{ $i }}][tooth_number]" class="input w-full" required>
                    <option value="">Select tooth</option>
                    @for ($t = 11; $t <= 48; $t++)
                        <option value="{{ $t }}" @selected((string) $item['tooth_number'] === (string) $t)>
                            {{ $t }}
                        </option>
                    @endfor
                </select>
                @error("items.{$i}.tooth_number")
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-2">
                <label class="block font-medium">Procedure</label>
                <select name="items[{{ $i }}][procedure_id]" class="input w-full" required>
                    <option value="">Select procedure</option>
                    @foreach ($procedures as $proc)
                        <option value="{{ $proc->id }}" @selected((string) $item['procedure_id'] === (string) $proc->id)>
                            {{ $proc->name }}
                        </option>
                    @endforeach
                </select>
                @error("items.{$i}.procedure_id")
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-2">
                <label class="block font-medium">Tooth Color</label>
                <select name="items[{{ $i }}][color_id]" class="input w-full" required>
                    <option value="">Select color</option>
                    @foreach ($colors as $col)
                        <option value="{{ $col->id }}" @selected((string) $item['color_id'] === (string) $col->id)>
                            {{ $col->name }}
                        </option>
                    @endforeach
                </select>
                @error("items.{$i}.color_id")
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-2">
                <label class="block font-medium">Notes (optional)</label>
                <textarea name="items[{{ $i }}][notes]" class="input w-full" rows="2">{{ $item['notes'] }}</textarea>
            </div>

            <button type="button" class="remove-item absolute top-2 right-2 text-red-500 hover:text-red-700"
                aria-label="Remove item">
                &times;
            </button>
        </div>
    @endforeach
</div>

<button type="button" id="add-item" class="mt-4 bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600">
    + Add Tooth
</button>

<div class="mt-6">
    <button type="submit" class="btn-primary">
        {{ isset($order) ? 'Update Order' : 'Create Order' }}
    </button>
</div>
