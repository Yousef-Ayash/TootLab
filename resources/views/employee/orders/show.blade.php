@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
    <div class="px-4 py-6">
        <h1 class="text-2xl font-bold mb-2">Order #{{ $order->order_number }}</h1>
        <p class="text-gray-600 mb-4">Patient: {{ $order->patient_name }}</p>

        <div class="space-y-4">
            @foreach ($order->items as $item)
                <div class="bg-white p-4 rounded-lg shadow">
                    <p class="font-semibold">Tooth: {{ $item->tooth_number }}</p>
                    <p class="text-sm text-gray-600 mb-1">Procedure: {{ $item->procedure->name }}</p>
                    <p class="text-sm text-gray-600 mb-1">Color: {{ $item->color->name }}</p>

                    <div class="mt-3">
                        <h3 class="font-semibold text-sm mb-2">Steps</h3>
                        @foreach ($item->steps as $step)
                            @if ($step->user_id === auth()->id())
                                <form method="POST" action="{{ route('employee.steps.update', $step->id) }}"
                                    class="mb-2">
                                    @csrf
                                    @method('PUT')
                                    <div class="flex items-center justify-between">
                                        <span>{{ $step->step->name }}</span>
                                        <button type="submit"
                                            class="text-sm px-3 py-1 rounded {{ $step->is_done ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' }}">
                                            {{ $step->is_done ? 'Done' : 'Mark as Done' }}
                                        </button>
                                    </div>
                                </form>
                            @else
                                <div class="text-sm text-gray-500">{{ $step->step->name }} - Handled by
                                    {{ $step->user->username }}</div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            <a href="{{ route('employee.orders.index') }}" class="text-blue-600 hover:underline">&larr; Back to Assigned
                Orders</a>
        </div>
    </div>
@endsection
