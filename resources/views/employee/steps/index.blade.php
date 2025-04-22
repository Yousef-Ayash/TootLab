@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">My Work</h1>

        <table class="min-w-full bg-white rounded shadow overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">Order #</th>
                    <th class="px-4 py-2">Tooth #</th>
                    <th class="px-4 py-2">Procedure</th>
                    <th class="px-4 py-2">Step</th>
                    <th class="px-4 py-2">Assigned</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($steps as $s)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $s->order_id }}</td>
                        <td class="px-4 py-2">
                            {{ $s->order->procedures->firstWhere('procedure_id', $s->procedure_id)->tooth_number }}</td>
                        <td class="px-4 py-2">{{ $s->procedure->name }}</td>
                        <td class="px-4 py-2">{{ $s->step->name }}</td>
                        <td class="px-4 py-2">
                            @if ($s->user_id)
                                Assigned to {{ $s->user->name }}
                            @else
                                <span class="text-gray-500">Unclaimed</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 space-x-2">
                            @if (!$s->user_id)
                                <form action="{{ route('employee.steps.update', $s) }}" method="POST" class="inline">
                                    @csrf @method('PUT')
                                    <button name="claim" class="px-2 py-1 border rounded hover:bg-gray-100">
                                        Claim
                                    </button>
                                </form>
                            @endif

                            @if ($s->user_id === auth()->id() && !$s->is_done)
                                <form action="{{ route('employee.steps.update', $s) }}" method="POST" class="inline">
                                    @csrf @method('PUT')
                                    <button name="done"
                                        class="px-2 py-1 bg-green-600 text-white rounded hover:bg-green-700">
                                        Mark Done
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
