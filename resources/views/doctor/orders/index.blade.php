@extends('layouts.app')
@section('title', 'My Work')
@section('content')
    <div class="page">
        <h1 class="page-title">My Work</h1>
        @forelse($orders as $order)
            <a href="{{ route('doctor.orders.show', $order) }}" class="card card--order">
                <div class="flex justify-between">
                    <span>#{{ $order->order_number }}</span>
                    <span class="status status--{{ $order->status }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
                <p>{{ $order->patient_name }}</p>
            </a>
        @empty
            <p>No orders yet. <a href="{{ route('doctor.orders.create') }}">Create one</a>.</p>
        @endforelse
        <div class="pagination">{{ $orders->links() }}</div>
    </div>
@endsection
