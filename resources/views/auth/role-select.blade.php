@extends('layouts.app')

@section('title', 'Login - Choose Role')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen p-4">
        <h1 class="text-2xl font-bold mb-6">Login As</h1>
        <div class="space-y-4 w-full max-w-sm">
            <a href="{{ route('login', ['role' => 'doctor']) }}"
                class="block text-center bg-blue-500 text-white py-3 rounded-lg shadow">
                Doctor
            </a>
            <a href="{{ route('login', ['role' => 'employee']) }}"
                class="block text-center bg-green-500 text-white py-3 rounded-lg shadow">
                Employee
            </a>
        </div>
    </div>
@endsection
