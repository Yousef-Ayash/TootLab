@extends('layouts.app')
@section('title', 'Finance Record')
@section('content')
    <div class="page">
        <h1 class="page-title">Finance Record</h1>
        <div class="grid grid--2">
            <div class="card"><strong>Total Paid</strong>
                <p>{{ number_format($paid, 2) }} €</p>
            </div>
            <div class="card"><strong>Total Owed</strong>
                <p>{{ number_format($owed, 2) }} €</p>
            </div>
        </div>
        <h2 class="section-title">Orders</h2>
        @foreach ($orders as $o)
            <div class="card flex justify-between">
                <div><strong>#{{ $o->order_number }}</strong>
                    <p>{{ $o->items_count }} items</p>
                </div>
                <div class="text-right">
                    <p class="{{ $o->is_paid ? 'text--green' : 'text--orange' }}">
                        {{ $o->is_paid ? 'Paid' : 'Unpaid' }}
                    </p>
                    <p>{{ number_format($o->final_cost, 2) }} €</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
