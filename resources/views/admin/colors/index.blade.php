@extends('layouts.app')
@section('title', 'Colors')
@section('content')
    <div class="page">
        <div class="flex justify-between">
            <h1 class="page-title">Colors</h1>
            <a href="{{ route('admin.colors.create') }}" class="btn btn--primary">+ New</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Hex</th>
                    <th>Preview</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colors as $c)
                    <tr>
                        <td>{{ $c->name }}</td>
                        <td>#{{ $c->hex_code }}</td>
                        <td><span class="color-swatch" style="background:#{{ $c->hex_code }};"></span></td>
                        <td><a href="{{ route('admin.colors.edit', $c) }}" class="btn btn--small">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
