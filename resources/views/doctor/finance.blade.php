@extends('layouts.app')

@section('title', 'Finance Record')

@section('content')
    <div class="px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Finance Record</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-lg font-semibold">Total Paid</h2>
                <p class="text-3xl text-green-600">{{ number_format($paid, 2) }} €</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-lg font-semibold">Total Owed</h2>
                <p class="text-3xl text-yellow-600">{{ number_format($owed, 2) }} €</p>
            </div>
        </div>

        <h2 class="text-lg font-semibold mb-2">Orders</h2>
        <div class="space-y-4">
            @foreach ($orders as $order)
                <div class="bg-white p-4 rounded-lg shadow flex justify-between items-center">
                    <div>
                        <p class="font-medium">#{{ $order->order_number }} — {{ $order->patient_name }}</p>
                        <p class="text-sm text-gray-600">{{ $order->items_count }} procedures</p>
                    </div>
                    <div class="text-right">
                        <p class="{{ $order->is_paid ? 'text-green-600' : 'text-yellow-600' }}">
                            {{ $order->is_paid ? 'Paid' : 'Unpaid' }}
                        </p>
                        <p class="font-semibold">{{ number_format($order->final_cost, 2) }} €</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
