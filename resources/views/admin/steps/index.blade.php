@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Procedure Steps</h1>

        <div class="mb-4">
            <a href="{{ route('admin.steps.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                New Step
            </a>
        </div>

        <table class="min-w-full bg-white rounded shadow overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Procedure</th>
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2 text-left">Sort Order</th>
                    <th class="px-4 py-2 text-left">Assigned Employees</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($steps as $step)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $step->id }}</td>
                        <td class="px-4 py-2">{{ $step->procedure->name }}</td>
                        <td class="px-4 py-2">{{ $step->name }}</td>
                        <td class="px-4 py-2">{{ $step->sort_order }}</td>
                        <td class="px-4 py-2">
                            @foreach ($step->users as $user)
                                <span class="inline-block px-2 py-1 bg-gray-200 rounded mr-1">{{ $user->username }}</span>
                            @endforeach
                        </td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.steps.show', $step) }}" class="text-blue-600 hover:underline">View</a>
                            <a href="{{ route('admin.steps.edit', $step) }}"
                                class="text-yellow-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.steps.destroy', $step) }}" method="POST" class="inline"
                                onsubmit="return confirm('Are you sure?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
