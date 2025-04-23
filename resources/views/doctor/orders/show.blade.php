@extends('layouts.app')
@section('title', 'Order Details')
@section('content')
    <div class="page">
        <h1 class="page-title">Order #{{ $order->order_number }}</h1>
        <div class="card stack">
            <p><strong>Center:</strong> {{ $order->center_name }}</p>
            <p><strong>Patient:</strong> {{ $order->patient_name }}</p>
            <p><strong>Status:</strong>
                <span class="status status--{{ $order->status }}">
                    {{ ucfirst($order->status) }}
                </span>
            </p>
            @if ($order->notes)
                <p><strong>Notes:</strong> {{ $order->notes }}</p>
            @endif
        </div>
        <h2 class="section-title">Items</h2>
        @foreach ($order->items as $item)
            <div class="card stack">
                <p><strong>Tooth:</strong> {{ $item->tooth_number }}</p>
                <p><strong>Procedure:</strong> {{ $item->procedure->name }}</p>
                <p><strong>Color:</strong> {{ $item->color->name }}</p>
                @if ($item->notes)
                    <p><strong>Notes:</strong> {{ $item->notes }}</p>
                @endif
                <h3 class="sub-title">Steps</h3>
                <ol class="list-decimal">
                    @foreach ($item->steps as $step)
                        <li>
                            {{ $step->step->name }} –
                            <span class="status status--{{ $step->is_done ? 'completed' : 'pending' }}">
                                {{ $step->is_done ? 'Done' : 'Pending' }}
                            </span>
                        </li>
                    @endforeach
                </ol>
            </div>
        @endforeach
    </div>
@endsection
