@extends('layouts.app')

@section('title', 'Create User')

@section('content')
    <div class="px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Create New User</h1>
        <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-4">
            @include('admin.users._form')
        </form>
    </div>
@endsection
