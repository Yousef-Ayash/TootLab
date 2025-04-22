@csrf

{{-- Procedure core fields --}}
<div class="mb-4">
    <label class="block font-medium">Name</label>
    <input type="text" name="name" value="{{ old('name', $procedure->name ?? '') }}" class="input w-full" required>
    @error('name')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block font-medium">Description</label>
    <textarea name="description" class="input w-full">{{ old('description', $procedure->description ?? '') }}</textarea>
    @error('description')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block font-medium">Cost</label>
    <input type="number" name="cost" step="0.01" value="{{ old('cost', $procedure->cost ?? '') }}"
        class="input w-full" required>
    @error('cost')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block font-medium">Color</label>
    <select name="color_id" class="input w-full" required>
        @foreach ($colors as $color)
            <option value="{{ $color->id }}" @selected(old('color_id', $procedure->color_id ?? '') == $color->id)>
                {{ $color->name }}
            </option>
        @endforeach
    </select>
    @error('color_id')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div>

<hr class="my-6">

<h2 class="text-lg font-semibold mb-2">Procedure Steps</h2>

{{-- Steps container: initial rows (from old input or existing procedure) --}}
<div id="steps-container" class="space-y-4">
    @php
        $oldRows = old('steps', []);
        $existingRows = isset($procedure) ? $procedure->steps->toArray() : [];
        $rows = count($oldRows) ? $oldRows : $existingRows;
    @endphp

    @foreach ($rows as $i => $stepData)
        <div class="step-row bg-gray-50 p-4 rounded-lg border relative">
            @if (!empty($stepData['id']))
                <input type="hidden" name="steps[{{ $i }}][id]" value="{{ $stepData['id'] }}">
            @endif

            <div class="mb-2">
                <label class="block font-medium">Step Name</label>
                <input type="text" name="steps[{{ $i }}][name]" value="{{ $stepData['name'] ?? '' }}"
                    class="input w-full" required>
                @error("steps.{$i}.name")
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-2">
                <label class="block font-medium">Description</label>
                <textarea name="steps[{{ $i }}][description]" class="input w-full" rows="2">{{ $stepData['description'] ?? '' }}</textarea>
                @error("steps.{$i}.description")
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-2">
                <label class="block font-medium">Sort Order</label>
                <input type="number" name="steps[{{ $i }}][sort_order]"
                    value="{{ $stepData['sort_order'] ?? $i + 1 }}" class="input w-full" required>
                @error("steps.{$i}.sort_order")
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="button" class="remove-step absolute top-2 right-2 text-red-500 hover:text-red-700"
                aria-label="Remove step">&times;</button>
        </div>
    @endforeach
</div>

<button type="button" id="add-step"
    class="mt-4 bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition">
    + Add Step
</button>

<div class="mt-6">
    <button type="submit" class="btn-primary">
        {{ isset($procedure) ? 'Update Procedure' : 'Create Procedure' }}
    </button>
</div>
