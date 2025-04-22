@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">New Procedure Step</h1>

        <form action="{{ route('admin.steps.store') }}" method="POST">
            @csrf

            {{-- Procedure dropdown --}}
            <div class="mt-4">
                <label for="procedure_id" class="block font-medium">Procedure</label>
                <select name="procedure_id" id="procedure_id" class="w-full border rounded p-2">
                    @foreach ($procedures as $procedure)
                        <option value="{{ $procedure->id }}"
                            {{ old('procedure_id', $step->procedure_id ?? '') == $procedure->id ? 'selected' : '' }}>
                            {{ $procedure->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Step Name --}}
            <div class="mt-4">
                <label for="name" class="block font-medium">Step Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $step->name ?? '') }}"
                    class="w-full border rounded p-2">
            </div>

            {{-- Sort Order --}}
            <div class="mt-4">
                <label for="sort_order" class="block font-medium">Sort Order</label>
                <input type="number" name="sort_order" id="sort_order"
                    value="{{ old('sort_order', $step->sort_order ?? 0) }}" class="w-full border rounded p-2">
            </div>

            {{-- Description --}}
            <div class="mt-4">
                <label for="description" class="block font-medium">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full border rounded p-2">{{ old('description', $step->description ?? '') }}</textarea>
            </div>

            <div class="mt-4">
                <label class="block font-medium">Assign Employees</label>
                <select name="users[]" multiple class="w-full border rounded p-2">
                    @foreach ($employees as $e)
                        <option value="{{ $e->id }}">{{ $e->name }}</option>
                    @endforeach
                </select>
                <small>Select one or more employees who can work this step.</small>
            </div>

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                    Create Step
                </button>
            </div>
        </form>
    </div>
@endsection
