@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Step Details (#{{ $step->id }})</h1>

        <div class="bg-white rounded shadow p-6">
            <p><strong>Procedure:</strong> {{ $step->procedure->name }}</p>
            <p><strong>Name:</strong> {{ $step->name }}</p>
            <p><strong>Sort Order:</strong> {{ $step->sort_order }}</p>
            <p><strong>Description:</strong><br>{{ $step->description }}</p>
            <p><strong>Assigned Employees:</strong></p>
            <ul class="list-disc list-inside">
                @forelse($step->users as $user)
                    <li>{{ $user->username }}</li>
                @empty
                    <li><em>None</em></li>
                @endforelse
            </ul>
        </div>

        <div class="mt-6 flex space-x-2">
            <a href="{{ route('admin.steps.edit', $step) }}"
                class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
            <a href="{{ route('admin.steps.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Back
                to List</a>
        </div>
    </div>
@endsection
