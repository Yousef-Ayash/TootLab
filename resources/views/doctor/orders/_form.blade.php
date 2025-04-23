@csrf

{{-- <div class="mb-4">
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
</div> --}}


<div class="container">
    <!-- Top fields -->
    <div class="row">
        <div class="field">
            <label for="center_name">اسم المركز</label>
            <input class="input-field" name="center_name" id="center_name" type="text" placeholder="مثال: مركز الشفاء"
                value="{{ old('center_name', $order->center_name ?? '') }}" />
        </div>
        @error('center_name')
            {{ $message }}
        @enderror
        <div class="field">
            <label for="order_number">رقم الطلب</label>
            <input class="input-field" name="order_number" id="order_number" type="number" placeholder="مثال: 12345"
                value="{{ old('order_number', $order->order_number ?? '') }}" />
        </div>
        @error('order_number')
            {{ $message }}
        @enderror
    </div>
    <div class="row">
        <div class="field">
            <label for="patient_name">اسم المريض</label>
            <input class="input-field" name="patient_name" id="patient_name" type="text" placeholder="مثال: أحمد علي"
                value="{{ old('patient_name', $order->patient_name ?? '') }}" />
        </div>
        @error('patient_name')
            {{ $message }}
        @enderror
        <div class="field">
            <label for="doctor_name">اسم الطبيب</label>
            <input class="input-field" name="doctor_name" id="doctor_name" type="text" placeholder="مثال: د. محمد" />
        </div>
    </div>

    {{-- <ul class="teeth-list">
        <li>11~48</li>
    </ul> --}}
    @php
        $old = old('procedures', []);
        $procedures = count($old) ? $old : [['tooth_number' => '', 'procedure_id' => '', 'color_id' => '']];
    @endphp
    @foreach ($procedures as $i => $procedure)
        <div class="bottom-row">
            {{-- <div class="field full">
                <label>ملاحظات</label>
                <input class="input-field" type="text" placeholder="أضف أي ملاحظات هنا" />
            </div> --}}
            <div class="field full">
                <label>اللون</label>
                {{-- <input class="input-field" type="text" placeholder="مثال: A2" /> --}}
                <select name="procedures[{{ $i }}][color_id]" class="input-field" required>
                    <option value="">اختر اللون</option>
                    @foreach ($colors as $col)
                        <option value="{{ $col->id }}" @selected((string) $procedure['color_id'] === (string) $col->id)>
                            {{ $col->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error("procedures.{$i}.color_id")
                {{ $message }}
            @enderror
        </div>
    @endforeach

    <div class="buttons">
        <button type="submit" id="send">إرسال الطلب</button>
        <a href={{ route('doctor.dashboard') }} id="cancel">إلغاء الطلب</a>
    </div>
</div>
