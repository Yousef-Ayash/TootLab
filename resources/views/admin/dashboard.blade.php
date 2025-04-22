@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="px-4 py-6">
        <!-- Page Heading -->
        <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Users -->
            <a href="{{ route('admin.users.index') }}" class="block">
                <div class="bg-white p-4 rounded-lg shadow hover:shadow-md transition">
                    <h2 class="text-lg font-semibold">Users</h2>
                    <p class="mt-2 text-3xl">{{ $userCount }}</p>
                    <p class="text-gray-500 text-sm">Doctors & Employees</p>
                </div>
            </a>

            <!-- Procedures -->
            <a href="{{ route('admin.procedures.index') }}" class="block">
                <div class="bg-white p-4 rounded-lg shadow hover:shadow-md transition">
                    <h2 class="text-lg font-semibold">Procedures</h2>
                    <p class="mt-2 text-3xl">{{ $procedureCount }}</p>
                    <p class="text-gray-500 text-sm">Total procedures</p>
                </div>
            </a>

            <!-- Colors -->
            <a href="{{ route('admin.colors.index') }}" class="block">
                <div class="bg-white p-4 rounded-lg shadow hover:shadow-md transition">
                    <h2 class="text-lg font-semibold">Colors</h2>
                    <p class="mt-2 text-3xl">{{ $colorCount }}</p>
                    <p class="text-gray-500 text-sm">Available colors</p>
                </div>
            </a>

            <!-- Steps -->
            <a href="{{ route('admin.steps.index') }}" class="block">
                <div class="bg-white p-4 rounded-lg shadow hover:shadow-md transition">
                    <h2 class="text-lg font-semibold">Procedure Steps</h2>
                    <p class="mt-2 text-3xl">{{ $stepCount }}</p>
                    <p class="text-gray-500 text-sm">Defined steps</p>
                </div>
            </a>
        </div>
    </div>
@endsection
