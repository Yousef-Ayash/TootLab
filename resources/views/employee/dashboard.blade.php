@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Employee Dashboard</h1>

        <div class="grid grid-cols-3 gap-4">
            <div class="p-4 bg-white rounded shadow">
                <h2 class="text-lg">Total Steps</h2>
                <p class="text-3xl">{{ $totalSteps }}</p>
            </div>
            <div class="p-4 bg-white rounded shadow">
                <h2 class="text-lg">Pending Steps</h2>
                <p class="text-3xl">{{ $pendingSteps }}</p>
            </div>
            <div class="p-4 bg-white rounded shadow">
                <h2 class="text-lg">My Pending</h2>
                <p class="text-3xl">{{ $myPending }}</p>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('employee.steps.index') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Go to My Work
            </a>
        </div>
    </div>
@endsection
