@extends('layouts.app')
@section('title', 'Users')
@section('content')
    <div class="page">
        <div class="flex justify-between">
            <h1 class="page-title">Users</h1>
            <a href="{{ route('admin.users.create') }}" class="btn btn--primary">+ New</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                    <tr>
                        <td>{{ $u->username }}</td>
                        <td>{{ ucfirst($u->role) }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $u) }}" class="btn btn--small">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
