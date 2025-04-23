@extends('layouts.app')
@section('title', 'Assigned Steps')
@section('content')
    <div class="page">
        <h1 class="page-title">Your Steps</h1>
        @forelse($steps as $step)
            <div class="card flex justify-between">
                <div>
                    <p>#{{ $step->order->order_number }} – {{ $step->step->name }}</p>
                </div>
                <form method="POST" action="{{ route('employee.steps.update', $step) }}">
                    @csrf @method('PUT')
                    <button type="submit" class="btn btn--small {{ $step->is_done ? 'btn--light' : 'btn--primary' }}">
                        {{ $step->is_done ? 'Done' : 'Mark Done' }}
                    </button>
                </form>
            </div>
        @empty
            <p>No steps assigned.</p>
        @endforelse
    </div>
@endsection
