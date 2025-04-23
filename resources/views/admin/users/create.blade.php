@extends('layouts.app')
@section('title', 'Create User')
@section('content')
    <div class="page">
        <h1 class="page-title">New User</h1>
        <form method="POST" action="{{ route('admin.users.store') }}">
            @include('admin.users._form')
        </form>
    </div>
@endsection
