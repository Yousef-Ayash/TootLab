@extends('layouts.app')

@section('title', 'Doctor Dashboard')

@section('content')
    <div class="px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Welcome, Dr. {{ auth()->user()->name }}</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <a href="{{ route('doctor.orders.index') }}" class="block bg-white p-4 rounded-lg shadow hover:shadow-md">
                <h2 class="font-semibold">My Work</h2>
            </a>
            <a href="{{ route('doctor.orders.create') }}" class="block bg-white p-4 rounded-lg shadow hover:shadow-md">
                <h2 class="font-semibold">New Order</h2>
            </a>
            <a href="{{ route('doctor.finance') }}" class="block bg-white p-4 rounded-lg shadow hover:shadow-md">
                <h2 class="font-semibold">Finance Record</h2>
            </a>
            <a href="{{ route('doctor.prices') }}" class="block bg-white p-4 rounded-lg shadow hover:shadow-md">
                <h2 class="font-semibold">Prices List</h2>
            </a>
            <a href="{{ route('doctor.contact') }}" class="block bg-white p-4 rounded-lg shadow hover:shadow-md">
                <h2 class="font-semibold">Contact Us</h2>
            </a>
        </div>
    </div>
@endsection
