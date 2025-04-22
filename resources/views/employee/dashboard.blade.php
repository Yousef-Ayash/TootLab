@extends('layouts.app')

@section('title', 'Employee Dashboard')

@section('content')
    <div class="px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Welcome, {{ auth()->user()->username }}</h1>

        <div class="grid grid-cols-1 gap-4">
            <a href="{{ route('employee.orders.index') }}" class="block bg-white p-4 rounded-lg shadow hover:shadow-md">
                <h2 class="font-semibold">Assigned Orders</h2>
                <p class="text-sm text-gray-600">View and complete your assigned steps</p>
            </a>
        </div>
    </div>
@endsection
