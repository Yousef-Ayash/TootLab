@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <div class="px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Contact Us</h1>

        <ul class="space-y-3">
            @foreach ($social as $platform => $url)
                <li>
                    <a href="{{ $url }}" target="_blank"
                        class="flex items-center space-x-2 bg-white p-4 rounded-lg shadow hover:shadow-md">
                        <span class="font-medium capitalize">{{ $platform }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 3l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
