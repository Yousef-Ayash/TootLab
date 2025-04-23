@extends('layouts.app')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="page">
        <h1 class="page-title">Admin Dashboard</h1>
        <div class="grid grid--2">
            <a href="{{ route('admin.users.index') }}" class="card">Users</a>
            <a href="{{ route('admin.procedures.index') }}" class="card">Procedures</a>
            <a href="{{ route('admin.colors.index') }}" class="card">Colors</a>
            <a href="{{ route('admin.steps.index') }}" class="card">Steps</a>
        </div>
    </div>
@endsection
