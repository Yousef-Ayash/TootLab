@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
    <div class="px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Order #{{ $order->order_number }}</h1>

        <div class="bg-white p-4 rounded-lg shadow space-y-4">
            <p><span class="font-medium">Center:</span> {{ $order->center_name }}</p>
            <p><span class="font-medium">Patient:</span> {{ $order->patient_name }}</p>
            <p>
                <span class="font-medium">Status:</span>
                <span class="{{ $order->status == 'completed' ? 'text-green-600' : 'text-yellow-600' }}">
                    {{ ucfirst($order->status) }}
                </span>
            </p>
            @if ($order->notes)
                <p><span class="font-medium">Notes:</span> {{ $order->notes }}</p>
            @endif

            <h2 class="text-lg font-semibold mt-4">Items</h2>
            <div class="space-y-4">
                @foreach ($order->items as $item)
                    <div class="border rounded-lg p-3">
                        <p><span class="font-medium">Tooth:</span> {{ $item->tooth_number }}</p>
                        <p><span class="font-medium">Procedure:</span> {{ $item->procedure->name }}</p>
                        <p><span class="font-medium">Color:</span> {{ $item->color->name }}</p>
                        @if ($item->notes)
                            <p><span class="font-medium">Notes:</span> {{ $item->notes }}</p>
                        @endif

                        <h3 class="font-semibold mt-2">Steps</h3>
                        <ol class="list-decimal list-inside text-sm">
                            @foreach ($item->steps as $step)
                                <li>
                                    {{ $step->step->name }} —
                                    @if ($step->is_done)
                                        <span class="text-green-600">Done</span>
                                    @else
                                        <span class="text-yellow-600">Pending</span>
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('doctor.orders.index') }}" class="text-blue-600 hover:underline">&larr; Back to My Work</a>
        </div>
    </div>
@endsection
