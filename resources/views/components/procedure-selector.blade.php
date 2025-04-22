<div class="mt-4">
    <label for="procedure_id" class="block font-medium text-sm text-gray-700">Select Procedure</label>
    <select name="procedure_id" id="procedure_id" class="mt-1 block w-full rounded border-gray-300">
        @foreach ($procedures as $procedure)
            <option value="{{ $procedure->id }}">{{ $procedure->name }} ({{ $procedure->cost }}$)</option>
        @endforeach
    </select>

    <label for="color_id" class="mt-4 block font-medium text-sm text-gray-700">Select Tooth Color</label>
    <select name="color_id" id="color_id" class="mt-1 block w-full rounded border-gray-300">
        @foreach ($colors as $color)
            <option value="{{ $color->id }}">{{ $color->name }}</option>
        @endforeach
    </select>
</div>
