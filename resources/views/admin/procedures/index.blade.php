@extends('layouts.app')

@section('title', 'Procedures')

@section('content')
    <div class="px-4 py-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Procedures</h1>
            <a href="{{ route('admin.procedures.create') }}" class="btn-primary">+ New Procedure</a>
        </div>

        <table class="table-auto w-full bg-white shadow rounded">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Cost</th>
                    <th class="px-4 py-2">Color</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($procedures as $procedure)
                    <tr>
                        <td class="border px-4 py-2">{{ $procedure->name }}</td>
                        <td class="border px-4 py-2">{{ number_format($procedure->cost, 2) }}</td>
                        <td class="border px-4 py-2">{{ $procedure->color->name }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('admin.procedures.edit', $procedure) }}"
                                class="text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
