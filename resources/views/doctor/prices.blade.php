@extends('layouts.app')

@section('title', 'Prices List')

@section('content')
    <div class="px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Prices List</h1>

        <div class="space-y-4">
            @foreach ($procedures as $procedure)
                <div class="bg-white p-4 rounded-lg shadow flex justify-between">
                    <div>
                        <p class="font-medium">{{ $procedure->name }}</p>
                        <p class="text-sm text-gray-600">{{ $procedure->description }}</p>
                    </div>
                    <p class="font-semibold">{{ number_format($procedure->cost, 2) }} €</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
