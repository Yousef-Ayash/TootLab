@extends('layouts.app')

@section('title', 'Colors')

@section('content')
    <div class="px-4 py-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Colors</h1>
            <a href="{{ route('admin.colors.create') }}" class="btn-primary">+ New Color</a>
        </div>

        <table class="table-auto w-full bg-white shadow rounded">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Hex Code</th>
                    <th class="px-4 py-2">Preview</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colors as $color)
                    <tr>
                        <td class="border px-4 py-2">{{ $color->name }}</td>
                        <td class="border px-4 py-2">{{ $color->hex_code }}</td>
                        <td class="border px-4 py-2">
                            <span class="inline-block w-6 h-6 rounded-full border"
                                style="background-color: {{ $color->hex_code }}"></span>
                        </td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('admin.colors.edit', $color) }}"
                                class="text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
