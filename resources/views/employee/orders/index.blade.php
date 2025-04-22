@extends('layouts.app')

@section('title', 'Assigned Orders')

@section('content')
    <div class="px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Your Assigned Steps</h1>

        @if ($steps->count())
            <div class="space-y-4">
                @foreach ($steps as $step)
                    <a href="{{ route('employee.orders.show', $step->order_id) }}"
                        class="block bg-white p-4 rounded-lg shadow hover:shadow-md">
                        <p class="font-medium">Order #{{ $step->order->order_number }} – {{ $step->order->patient_name }}</p>
                        <p class="text-sm text-gray-600">Step: {{ $step->step->name }}</p>
                        <p class="text-sm {{ $step->is_done ? 'text-green-600' : 'text-yellow-600' }}">
                            {{ $step->is_done ? 'Completed' : 'Pending' }}
                        </p>
                    </a>
                @endforeach
            </div>
        @else
            <p class="text-gray-600">You have no assigned steps at the moment.</p>
        @endif
    </div>
@endsection
