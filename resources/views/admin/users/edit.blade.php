@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Edit User</h1>
        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-4">
            @method('PUT')
            @include('admin.users._form', ['user' => $user])
        </form>
    </div>
@endsection
