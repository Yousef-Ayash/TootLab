@extends('layouts.app')
@section('title', 'Procedures')
@section('content')
    <div class="page">
        <div class="flex justify-between">
            <h1 class="page-title">Procedures</h1>
            <a href="{{ route('admin.procedures.create') }}" class="btn btn--primary">+ New</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Cost</th>
                    <th>Color</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($procedures as $p)
                    <tr>
                        <td>{{ $p->name }}</td>
                        <td>{{ number_format($p->cost, 2) }}</td>
                        <td>{{ $p->color->name }}</td>
                        <td><a href="{{ route('admin.procedures.edit', $p) }}" class="btn btn--small">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
