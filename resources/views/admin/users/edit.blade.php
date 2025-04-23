@extends('layouts.app')
@section('title', 'Edit User')
@section('content')
    <div class="page">
        <h1 class="page-title">Edit User</h1>
        <form method="POST" action="{{ route('admin.users.update', $user) }}">
            @method('PUT')
            @include('admin.users._form')
        </form>
    </div>
@endsection
