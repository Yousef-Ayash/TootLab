@extends('layouts.app')
@section('title', 'Procedure Steps')
@section('content')
    <div class="page">
        <div class="flex justify-between">
            <h1 class="page-title">Procedure Steps</h1>
            <a href="{{ route('admin.steps.create') }}" class="btn btn--primary">+ New</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Procedure</th>
                    <th>Name</th>
                    <th>Order</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($steps as $s)
                    <tr>
                        <td>{{ $s->procedure->name }}</td>
                        <td>{{ $s->name }}</td>
                        <td>{{ $s->sort_order }}</td>
                        <td><a href="{{ route('admin.steps.edit', $s) }}" class="btn btn--small">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
