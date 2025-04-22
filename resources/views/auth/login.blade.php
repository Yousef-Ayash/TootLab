@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="w-full max-w-sm bg-white p-6 rounded-xl shadow">
            <h2 class="text-xl font-semibold mb-4 text-center">Login as {{ ucfirst($role) }}</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Preserve the selected role --}}
                <input type="hidden" name="role" value="{{ $role }}">

                {{-- Username --}}
                <div class="mb-4">
                    <label for="username" class="block mb-1 font-medium text-sm">Username</label>
                    <input id="username" name="username" type="text" value="{{ old('username') }}" required autofocus
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    @error('username')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-4">
                    <label for="password" class="block mb-1 font-medium text-sm">Password</label>
                    <input id="password" name="password" type="password" required
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Login Error --}}
                @error('login')
                    <p class="text-red-500 text-sm mb-4">{{ $message }}</p>
                @enderror

                {{-- Submit --}}
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                    Login
                </button>
            </form>

            {{-- Logout form (example usage elsewhere) --}}
            {{-- 
        <form method="POST" action="{{ route('logout') }}" class="mt-4 text-center">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-sm text-gray-600 hover:underline">
                Logout
            </button>
        </form>
        --}}
        </div>
    </div>
@endsection
