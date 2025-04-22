@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
    <div class="px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">My Work</h1>

        @if ($orders->count())
            <div class="space-y-4">
                @foreach ($orders as $order)
                    <a href="{{ route('doctor.orders.show', $order) }}"
                        class="block bg-white p-4 rounded-lg shadow hover:shadow-md">
                        <div class="flex justify-between">
                            <div>
                                <p class="font-semibold">Order #{{ $order->order_number }}</p>
                                <p class="text-sm text-gray-600">{{ $order->patient_name }}</p>
                            </div>
                            <div>
                                <span
                                    class="text-sm {{ $order->status == 'completed' ? 'text-green-600' : 'text-yellow-600' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-6">{{ $orders->links() }}</div>
        @else
            <p class="text-gray-600">
                No orders yet. <a href="{{ route('doctor.orders.create') }}" class="text-blue-600 hover:underline">
                    Create one
                </a>.
            </p>
        @endif
    </div>
@endsection
